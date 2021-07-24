<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreviousAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('previous_ads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('video')->nullable();
            $table->string('link')->nullable();
            $table->bigInteger('famous_id')->unsigned();
            $table->foreign('famous_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('previous_ads');
    }
}
