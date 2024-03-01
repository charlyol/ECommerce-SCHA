<?php

namespace Database\Migrations;

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $tableName = 'Users';

    /**
     * Run the migrations.
     * @table Users
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->tableName, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('name', 45);
            $table->string('nickname', 45);
            $table->integer('age');
            $table->string('password', 45);
            $table->string('mail', 100);
            $table->string('adress', 200);
            $table->integer('zip_code');
            $table->string('country', 45);
            $table->string('city', 45);
            $table->integer('User_categories_id');

            $table->unique(["nickname"], 'nickname_UNIQUE');

            $table->unique(["mail"], 'mail_UNIQUE');

            $table->index(["User_categories_id"], 'fk_Users_User_categories1_idx');


            $table->foreign('User_categories_id', 'fk_Users_User_categories1_idx')
                ->references('id')->on('User_categories')
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
