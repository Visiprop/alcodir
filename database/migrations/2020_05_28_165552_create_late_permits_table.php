<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLatePermitsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('late_permits', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('user_id')->unsigned();            
            $table->string('reason');
            $table->date('date');
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
        Schema::dropIfExists('late_permits');
    }
}
