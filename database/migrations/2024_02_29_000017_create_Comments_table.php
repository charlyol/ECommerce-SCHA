<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Comments';

    /**
     * Run the migrations.
     * @table Comments
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->longText('content');
            $table->integer('Books_id');
            $table->integer('Users_id');

            $table->index(["Books_id"], 'fk_Comments_Books1_idx');

            $table->index(["Users_id"], 'fk_Comments_Users1_idx');


            $table->foreign('Books_id', 'fk_Comments_Books1_idx')
                ->references('id')->on('Books')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Users_id', 'fk_Comments_Users1_idx')
                ->references('id')->on('Users')
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
