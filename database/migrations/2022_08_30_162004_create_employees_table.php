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
            $table->bigInteger('document_id')->nullable();
            $table->string('num_id')->unique()->nullable();
            $table->string('first_name')->nullable();
            $table->string('second_name')->nullable();
            $table->string('surname')->nullable();
            $table->string('second_surname')->nullable();
            $table->string('profession')->nullable();
            $table->string('process')->nullable();
            $table->string('position')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->unique()->nullable();
            $table->string('address')->nullable(); 
            $table->string('admission_at')->nullable();
            $table->string('status')->nullable();
            $table->bigInteger('user_id')->unsigned()->nullable();

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
