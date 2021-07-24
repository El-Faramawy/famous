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
            $table->id();
            $table->string('name');
            $table->string('phone_code');
            $table->string('phone')->unique();
            $table->string('image')->nullable();
            $table->bigInteger('job_id')->unsigned();
            $table->foreign('job_id')->references('id')->on('jops')->onDelete('cascade');
            $table->string('rate')->nullable();
            $table->integer('visitors')->nullable();
            $table->text('cv')->nullable();
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('twitter')->nullable();
            $table->string('youtube')->nullable();
            $table->string('snapchat')->nullable();
            $table->enum('is_favorite',['yes','no'])->default('no')->nullable();
            $table->enum('status',['new','accepted','refused'])->default('new')->nullable();
            $table->string('id_num')->nullable();
            $table->string('tax_num')->nullable();
            $table->string('trade_num')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_person')->nullable();
            $table->string('company_email')->nullable();
            $table->rememberToken();
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
