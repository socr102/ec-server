<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDishIngredientTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dish_ingredient', function (Blueprint $table) {
            $table->increments('id_dish_ingredient', 11);
            $table->integer('dish_id');
            $table->string('ingredient', 100);
            $table->integer('quantity');
            $table->enum('unit', ['Kilogram', 'Gram', 'Ons', 'Miligram', 'Pcs', 'Cup']);
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
        Schema::dropIfExists('dish_ingredient');
    }
}
