<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class LinkedinConnectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('linkedin_connects', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->string('name')->nullable();
            $table->string('position')->nullable();
            $table->string('company')->nullable();
            $table->string('url')->nullable();
            $table->string('gender')->nullable();
            $table->integer('status')->nullable();                                 
            $table->timestamps();           

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
