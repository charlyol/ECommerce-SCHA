<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHasBookCategoriesTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Books_has_Book_categories';

    /**
     * Run the migrations.
     * @table Books_has_Book_categories
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Books_id');
            $table->integer('Book_categories_id');

            $table->index(["Book_categories_id"], 'fk_Books_has_Book_categories_Book_categories1_idx');

            $table->index(["Books_id"], 'fk_Books_has_Book_categories_Books1_idx');


            $table->foreign('Books_id', 'fk_Books_has_Book_categories_Books1_idx')
                ->references('id')->on('Books')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Book_categories_id', 'fk_Books_has_Book_categories_Book_categories1_idx')
                ->references('id')->on('Book_categories')
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
