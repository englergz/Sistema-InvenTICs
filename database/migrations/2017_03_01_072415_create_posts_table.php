<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('trademark_id')->nullable();
            $table->string('serial')->nullable();
            $table->string('title')->nullable();
            $table->string('url')->unique()->nullable();
            $table->mediumText('iframe')->nullable();
            $table->mediumText('body')->nullable();
            $table->timestamp('published_at')->nullable();
           
            $table->unsignedInteger('category_id')->nullable();
            $table->bigInteger('user_id')->unsigned();

            $table->bigInteger('employee_id')->unsigned()->nullable();
            $table->timestamp('employee_debtor_since')->nullable();
            $table->bigInteger('assigns_user_id')->nullable();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

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
        Schema::dropIfExists('posts');
    }
}
