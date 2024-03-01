<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHasImagePathTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Books_has_Image_path';

    /**
     * Run the migrations.
     * @table Books_has_Image_path
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Books_id');
            $table->integer('Image_path_id');

            $table->index(["Image_path_id"], 'fk_Books_has_Image_path_Image_path1_idx');

            $table->index(["Books_id"], 'fk_Books_has_Image_path_Books1_idx');


            $table->foreign('Books_id', 'fk_Books_has_Image_path_Books1_idx')
                ->references('id')->on('Books')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Image_path_id', 'fk_Books_has_Image_path_Image_path1_idx')
                ->references('id')->on('Image_path')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists($this->tableName);
    }
}
