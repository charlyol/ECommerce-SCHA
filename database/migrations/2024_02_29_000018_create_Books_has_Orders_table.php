<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBooksHasOrdersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Books_has_Orders';

    /**
     * Run the migrations.
     * @table Books_has_Orders
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('Books_id');
            $table->integer('Orders_id');
            $table->unsignedInteger('quantity');

            $table->index(["Orders_id"], 'fk_Books_has_Orders_Orders1_idx');

            $table->index(["Books_id"], 'fk_Books_has_Orders_Books1_idx');


            $table->foreign('Books_id', 'fk_Books_has_Orders_Books1_idx')
                ->references('id')->on('Books')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('Orders_id', 'fk_Books_has_Orders_Orders1_idx')
                ->references('id')->on('Orders')
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
