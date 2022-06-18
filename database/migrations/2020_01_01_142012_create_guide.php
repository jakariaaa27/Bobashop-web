<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuide extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guide', function (Blueprint $table) {
            $table->smallIncrements('guide_id');
            $table->string('name',255);
            $table->string('email',255);
            $table->string('phone',255);
            $table->text('photo');
            $table->smallInteger('dest_id')->nullable()->unsigned();
            $table->foreign('dest_id')->references('dest_id')->on('destination')->onDelete('cascade');
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
        Schema::dropIfExists('guide');
    }
}
