<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class QueryFieldsRequest extends FormRequest
{
    /**
     * The index of the model class name on the route.
     *
     * @const int
     */
    const CLASS_ROUTE_INDEX = 0;

    /**
     * The initial Model Class node of the graph.
     *
     * @var /App/Model
     */
    protected $model = null;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        dd($this->all());
        return [
            'fields' => 'array',
            'fields.*' => [
                'string',
                Rule::in($this->model::queryableFields())
            ]
        ];
    }

    /**
     * Get data to be validated from the request.
     *
     * @return array
     */
    protected function validationData()
    {
        return [
            'fields' => array_keys($this->all())
        ];
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->model = "\App\\".ucfirst(str_singular(explode('.',
            $this->route()->getName())[static::CLASS_ROUTE_INDEX]
        ));
    }

    /**
     * Validate the class instance.
     *
     * @return void
     */
    public function validate()
    {
        parent::validate();
        // $this->formatInput();
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function formatInput()
    {
        // $this->merge([
        //     'fields' => array_intersect($this->model::getillable(), array2)
        //     'relations' => 
        // ]);
    }

    /**
     * Prepare the data for validation.
     *
     * @return void
     */
    protected function makeEagerLoaderArray($with)
    {
        return collect($with)->transform(function ($w, $resource) {
            return function ($query) use ($w) {
                if (is_array($w)) {
                    if (array_key_exists('where', $w)) {
                        foreach($w['where'] as $where) {
                            $query->where($where['field'], $where['operator'], $where['value']);
                        }
                    }
                    if (array_key_exists('limit', $w)) {
                        $query->limit($w['limit']);
                    }
                }
                $query->getRelated()->whenEagerLoader($query);
            };
        })->toArray();
    }
}
