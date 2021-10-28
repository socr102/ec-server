<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishNutrition extends Model
{
    protected $guarded = [];

    protected $table = "dish_nutrition";
    protected $primaryKey = "id_dish_nutrition";
}
