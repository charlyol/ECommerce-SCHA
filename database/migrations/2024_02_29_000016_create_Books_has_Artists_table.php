<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHasArtistsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Books_has_Artists';

    /**
     * Run the migrations.
     * @table Books_has_Artists
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Books_id');
            $table->integer('Artists_id');

            $table->index(["Artists_id"], 'fk_Books_has_Artists_Artists1_idx');

            $table->index(["Books_id"], 'fk_Books_has_Artists_Books_idx');


            $table->foreign('Books_id', 'fk_Books_has_Artists_Books_idx')
                ->references('id')->on('Books')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Artists_id', 'fk_Books_has_Artists_Artists1_idx')
                ->references('id')->on('Artists')
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
