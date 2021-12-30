<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRatingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ratings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('rating');
            $table->unsignedBigInteger('employerId');
            $table->unsignedBigInteger('employeeId');            
            $table->timestamps();
            $table->foreign('employerId')->references('id')->on('Employers')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('employeeId')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ratings');
    }
}
