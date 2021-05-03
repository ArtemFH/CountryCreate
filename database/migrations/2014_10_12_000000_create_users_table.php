<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('username', 100)->nullable(false)->unique('username');
            $table->string('password', 100)->nullable(false);
            $table->foreignId('role_id')->nullable()->default('10')->constrained('roles')->onDelete('cascade');
            $table->foreignId('gender_id')->nullable()->constrained('genders')->onDelete('cascade');
            $table->integer('age');
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
