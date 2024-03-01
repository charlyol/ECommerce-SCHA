<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Books';

    /**
     * Run the migrations.
     * @table Books
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 45);
            $table->longText('description');
            $table->string('summary', 80)->nullable();
            $table->integer('Sagas_id');
            $table->integer('Age_classes_id');
            $table->float('price')->nullable();

            $table->index(["Sagas_id"], 'fk_Books_Sagas1_idx');

            $table->index(["Age_classes_id"], 'fk_Books_Age_classes1_idx');


            $table->foreign('Sagas_id', 'fk_Books_Sagas1_idx')
                ->references('id')->on('Sagas')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Age_classes_id', 'fk_Books_Age_classes1_idx')
                ->references('id')->on('Age_classes')
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
