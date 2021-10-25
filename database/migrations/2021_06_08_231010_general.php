<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class General extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('general', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('footer');
            $table->longText('description');
            $table->longText('keywords');
            $table->string('phone');
            $table->string('mail');
            $table->string('adress');
            $table->longText('map');
            $table->string('twitter');
            $table->string('facebook');
            $table->string('instagram');
            $table->string('whatsapp');
            $table->string('logo');
            $table->string('favicon');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('general');
    }
}
