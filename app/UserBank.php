<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserBank extends Model
{
    protected $guarded = [];

    protected $table = "users_bank";
    protected $primaryKey = "id_users_bank";
}
