<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLogHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('log_histories', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('create_user_id')->nullable();
            $table->bigInteger('destroy_user_id')->nullable();
            $table->bigInteger('assigns_user_id')->nullable();
            $table->bigInteger('receives_user_id')->nullable();

            $table->string('trademark_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->nullable();
            $table->mediumText('iframe')->nullable();
            $table->mediumText('body')->nullable();
            $table->timestamp('published_at')->nullable();
            $table->string('category_id')->nullable();
           
            $table->string('employee_id')->nullable();
            $table->string('employee_name')->nullable();
            $table->string('employee_surname')->nullable();
            $table->timestamp('employee_debtor_since')->nullable();
            $table->timestamp('employee_debtor_until')->nullable();
            
            $table->string('obs')->nullable();
            $table->bigInteger('post_id')->unsigned()->nullable();
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
        Schema::dropIfExists('log_histories');
    }
}
