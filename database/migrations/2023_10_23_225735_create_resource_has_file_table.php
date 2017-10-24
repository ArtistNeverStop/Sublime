<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\File;

class CreateResourceHasFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resource_has_file', function (Blueprint $table) {
            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('id')->on('files')->onDelete('cascade');
            $table->integer('user_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->tinyInteger('type')->default(File::DEFAULT_TYPE);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resource_has_file');
    }
}
