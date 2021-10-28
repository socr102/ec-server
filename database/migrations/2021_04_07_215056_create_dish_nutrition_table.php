<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishNutritionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_nutrition', function (Blueprint $table) {
            $table->increments('id_dish_nutrition', 11);
            $table->integer('dish_id');
            $table->integer('fats');
            $table->integer('calorie');
            $table->integer('carbs');
            $table->integer('protein');
            $table->integer('cholestrol');
            $table->integer('sodium');
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
        Schema::dropIfExists('dish_nutrition');
    }
}
