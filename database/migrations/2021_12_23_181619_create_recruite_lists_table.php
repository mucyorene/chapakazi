<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecruiteListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruite_lists', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('employerId')->nullable();
            $table->unsignedBigInteger('empId')->nullable();
            $table->timestamps();
            $table->string('status');
            $table->foreign('employerId')->references('id')->on('employers')->onDelete('cascade');
            $table->foreign('empId')->references('id')->on('employees')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recruite_lists');
    }
}
