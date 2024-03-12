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
            $table->uuid('id')->primary();
            $table->string('first_name', 90);
            $table->string('last_name', 90);
            $table->string('password');
            $table->string('email', 200);
            $table->string('nickname', 50)->nullable();
            $table->unsignedInteger('age')->nullable();
            $table->string('pic_path', 255)->nullable();
            $table->foreignUuid('roles_id') ->default('admin');
            $table->timestamps();
            $table->longText('bio') ->nullable();
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
