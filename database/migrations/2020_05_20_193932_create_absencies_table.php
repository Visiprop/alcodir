<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAbsenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('absencies', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('user_id')->unsigned();
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
        Schema::dropIfExists('absencies');
    }
}
