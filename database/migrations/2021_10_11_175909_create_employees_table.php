<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('identificationNumber')->unique();
            $table->string('firstName');
            $table->string('lastName');
            $table->string('experience');
            $table->date('dob');
            $table->string('availability');
            $table->string('ratePerDay'); 
            $table->string('category');
            $table->string('gender');
            $table->string('phone');
            $table->string('status');
            $table->string('profile');
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
        Schema::dropIfExists('employees');
    }
}
