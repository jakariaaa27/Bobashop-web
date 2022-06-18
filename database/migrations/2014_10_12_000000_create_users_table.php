<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->tinyIncrements('users_id',3);
            $table->string('name',255);
            $table->string('email',255);
            $table->string('username', 255)->nullable();
            $table->string('password', 255);
            $table->string('password_md5', 255)->nullable();
            $table->longText('token_firebase')->nullable();
            $table->enum('status', ['admin', 'staff']);
            $table->text('photo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
