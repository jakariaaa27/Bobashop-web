<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSetting extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('setting', function (Blueprint $table) {
            $table->tinyIncrements('setting_id');
            $table->string('site_name',255)->nullable();
            $table->string('site_desc',255)->nullable();
            $table->string('logo_text1',255)->nullable();
            $table->string('logo_text2',255)->nullable();
            $table->string('footer_backend',255)->nullable();
            $table->text('background_login')->nullable();
            $table->text('logo')->nullable();
            $table->string('simple_text',255)->nullable();
            $table->string('footer_frontend',255)->nullable();
            $table->text('front_logo')->nullable();
            $table->text('jumbotron')->nullable();
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
        Schema::dropIfExists('setting');
    }
}
