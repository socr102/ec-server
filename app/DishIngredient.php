<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishIngredient extends Model
{
    protected $guarded = [];

    protected $table = "dish_ingredient";
    protected $primaryKey = "id_dish_ingredient";
}
