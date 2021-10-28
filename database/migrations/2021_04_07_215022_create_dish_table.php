<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish', function (Blueprint $table) {
            $table->increments('id_dish', 11);
            $table->integer('user_id');
            $table->string('dish_name', 100);
            $table->text('description');
            $table->integer('number_of_availability');
            $table->integer('time_preparation');
            $table->integer('price');
            $table->string('dish_image', 100);
            $table->string('video_dish', 100);
            $table->tinyInteger('approve')->default('0');
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
        Schema::dropIfExists('dish');
    }
}
