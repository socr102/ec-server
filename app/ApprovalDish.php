<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ApprovalDish extends Model
{
    protected $guarded = [];

    protected $table = "approval_dish";
    protected $primaryKey = "id_approval_dish";

    public function dish()
    {
        return $this->belongsTo('App\Dish', 'dish_id', 'id_dish');
    }
}
