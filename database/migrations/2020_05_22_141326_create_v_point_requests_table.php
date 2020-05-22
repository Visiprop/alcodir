<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVPointRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('v_point_requests', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->id();
            $table->bigInteger('sldr_user_id')->unsigned();
            $table->bigInteger('mgm_user_id')->unsigned();
            $table->string('reason')->nullable();
            $table->integer('point')->nullable();
            $table->integer('status')->nullable();            
            $table->timestamps();           

            $table->foreign('sldr_user_id')->references('id')->on('users');
            $table->foreign('mgm_user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('v_point_requests');
    }
}
