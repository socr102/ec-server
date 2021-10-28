<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserAddress extends Model
{
    protected $guarded = [];

    protected $table = "users_address";
    protected $primaryKey = "id_users_address";
}
