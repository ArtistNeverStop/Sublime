<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Database\Eloquent\Model;
use App\User;
use App\Product;
use App\File;
use App\Artist;
use App\Place;
use App\Http\Requests\FilesStoreRequest;
use Auth;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        /**
     * The Resources Model Class to relate the stored file
     *
     * @var \App\Specgroup
     */
    const RESOURCES = [
        'users' => User::class,
        'products' => Product::class,
        'artists' => Artist::class,
        'places' => Place::class,
    ];

    /**
     * The Resource Model Class to relate the stored file
     *
     * @var string|Illuminate\Validation\Rule
     */
    protected $resourceClass = null;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function oldStore(FilesStoreRequest $request)
    {
        $files = [];
        foreach ($request->file('files') as $index => $uploadFile) {
            $file = File::create([
                'file_path' => $uploadFile->store('public/'.$request->resource),
                'mime_type' => $uploadFile->getMimeType(),
                'uploader_id' => Auth::user()->id,
            ]);
            $file->{$request->resource}()->attach($request->resource_id, ['type' => $request->types[$index] ?: File::DEFAULT_TYPE]);
            $files[] = $file;
        }
        return $files;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showFile(File $file)
    {
        return $file;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroyFile($resource, File $file)
    {
        $file->delete();
        return $file->{$resource};
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\FilesStoreRequest  $request
     * @param String|null $resource
     * @param int $id
     * @param \App\Model|null $model
     * @return \Illuminate\Http\Response
     */
    public function storeFilesRoute(FilesStoreRequest $request, $resource, $id, $model = null)
    {
        $files = [];
        $model = $model ?: (self::RESOURCES[$resource])::findOrFail($id);
        if ($request->replace) {
            $model->files()->delete(); // Replace all the current images for the new ones
        }
        foreach ($request->file('files') as $index => $file) {
            $files[] = $this->storeFile($file, $resource, $model, $request->types[$index]);
        }
        $model->fresh();
        $model->load(['images', 'files']);
        return $model;
    }

    /**
     * Store and attach to a specific model
     *
     * @param \App\Model $model
     * @param array $files
     * @return \App\Model
     */
    public function storeFiles(Model $model, array $files, $type = null)
    {
        foreach ($files as $index => $uploadFile) {
            $file = File::create([
                'file_path' => $uploadFile->store(get_class($model)),
                'mime_type' => $uploadFile->getMimeType(),
                'uploader_id' => Auth::user()->id,
            ]);
            $model->files()->attach($file->id, ['type' => $type ?: File::DEFAULT_TYPE]);
        }
        return $model->load(['files', 'images']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFile($file, $resource, $modelOrId, $type = File::DEFAULT_TYPE, $user = null)
    {
        if (!($modelOrId instanceof Model)) {
            $modelOrId = (self::RESOURCES[$resource])::findOrFail($modelOrId);
        }
        $fileModel = File::create([
            'file_path' => $file->store('public/'.$resource),
            'mime_type' => $file->getMimeType(),
            'uploader_id' => $user ? $user->id : Auth::user()->id,
        ]);
        $modelOrId->files()->attach($fileModel->id, ['type' => $type ?: File::DEFAULT_TYPE]);
        return $fileModel;
    }

    /**
     * Return the regex to only catch existing resources on the route.
     *
     * @return String
     */
    public static function resourceRegex()
    {
        return '\b('.implode('|', array_keys(static::RESOURCES)).')\b';
    }

    /**
     * Touch (Update updated_at) the given files to set the orderBy.
     *
     * @param  \App\Http\Requests\FilesExistRequest  $request
     * @return Array $files
     */
    public function orderFiles(FilesExistRequest $request)
    {
        $files = [];
        foreach ($request->input('files') as $index => $id) {
            $files[] = File::find($id);
            $files[$index]->update(['order' => microtime(true)]);
        }
        return $files;
    }
}
