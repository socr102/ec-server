<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DishComment extends Model
{
    protected $guarded = [];

    protected $table = "dish_comment";
    protected $primaryKey = "id";

    public function dish()
    {
        return $this->belongsTo('App\Dish', 'dish_id', 'id_dish');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
