<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid();
            $table->string('first_name', 90);
            $table->string('last_name', 90);
            $table->string('password', 50);
            $table->string('email', 200);
            $table->string('nickname', 50);
            $table->unsignedInteger('age');
            $table->string('pic_path', 255);
            $table->foreign('user_uuid')->references('uuid')->on('roles');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
