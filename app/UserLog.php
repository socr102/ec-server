<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserLog extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'ref_id',
        'action',
        'cancelled_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
