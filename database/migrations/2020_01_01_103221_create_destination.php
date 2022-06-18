<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDestination extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('destination', function (Blueprint $table) {
            $table->smallIncrements('dest_id');
            $table->string('dest_name',255);
            $table->text('address');
            $table->text('desc');
            $table->text('pict');
            $table->double('longitude')->nullable();
            $table->double('latitude')->nullable();
            $table->tinyInteger('province_id')->nullable()->unsigned();
            $table->foreign('province_id')->references('province_id')->on('province')->onDelete('cascade');
            $table->tinyInteger('city_id')->nullable()->unsigned();
            $table->foreign('city_id')->references('city_id')->on('city')->onDelete('cascade');
            $table->tinyInteger('type_id')->nullable()->unsigned();
            $table->foreign('type_id')->references('type_id')->on('type')->onDelete('cascade');
            $table->tinyInteger('users_id')->nullable()->unsigned();
            $table->foreign('users_id')->references('users_id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('destination');
    }
}
