<?php

namespace App;

use App\Notifications\ResetPasswordNotification;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password', 'title_id', 'provider', 'provider_id', 'photo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
    ];

    public static function boot()
    {
        parent::boot();

        // Event Trigger Delete
        static::deleting(function ($user) {
            DB::beginTransaction();
            try {
                $user->userAddresses()->delete();
                $user->userBanks()->delete();
                $user->helps()->delete();
                $user->helps()->delete();
                $user->dishComments()->delete();

                // should delete 1 by 1 to catch event trigger in dish model
                $user->dishes->each(function ($dish) {
                    $dish->delete();
                });

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollback();
                dd($ex);
            }
        });
    }

    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token));
    }

    public function role()
    {
        return $this->hasOne(Role::class);
    }

    public function roleCustomer()
    {
        return $this->hasOne(Role::class)->where('roles', 'customer');
    }

    public function roleHomeChef()
    {
        return $this->hasOne(Role::class)->where('roles', 'home-chef');
    }

    public function title()
    {
        return $this->belongsTo(Title::class);
    }

    public function userAddresses()
    {
        return $this->hasMany(UserAddress::class, 'user_id', 'id');
    }

    public function userBanks()
    {
        return $this->hasMany(UserBank::class, 'user_id', 'id');
    }

    public function helps()
    {
        return $this->hasMany(Help::class, 'user_id', 'id');
    }

    public function dishComments()
    {
        return $this->hasMany(DishComment::class, 'user_id', 'id');
    }

    public function dishes()
    {
        return $this->hasMany(Dish::class, 'user_id', 'id');
    }

    public function scopeGetHomeChef($query)
    {
        return $query->with('roleHomeChef')->whereHas('roleHomeChef');
    }

    public function scopeGetCustomer($query)
    {
        return $query->with('roleCustomer')->whereHas('roleCustomer');
    }

    public function getIsBasicChefAttribute()
    {
        if ($this->title) {
            return $this->title->name === 'Basic Chef';
        }
        return false;
    }

    public function getTitleNameAttribute()
    {
        if ($this->title) {
            return $this->title->name;
        }
        return 'Newbie';
    }
}
