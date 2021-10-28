<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class Dish extends Model
{
    protected $guarded = [];

    protected $table = "dish";
    protected $primaryKey = "id_dish";

    public static function boot()
    {
        parent::boot();

        // Event Trigger Delete
        static::deleting(function ($dish) {
            DB::beginTransaction();
            try {
                $image = public_path('/images/food/' . $dish->dish_image);
                if (File::exists($image)) {
                    File::delete($image);
                }
                $dish->nutrition()->delete();
                $dish->ingredient()->delete();
                $dish->comments()->delete();
                $dish->approval()->delete();
                $dish->userLogs()->delete();

                DB::commit();
            } catch (\Exception $ex) {
                DB::rollback();
                dd($ex);
            }
        });
    }

    public function chef()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

    public function nutrition()
    {
        return $this->hasOne('App\DishNutrition', 'dish_id', 'id_dish');
    }

    public function ingredient()
    {
        return $this->hasMany('App\DishIngredient', 'dish_id', 'id_dish');
    }

    public function comments()
    {
        return $this->hasMany('App\DishComment', 'dish_id', 'id_dish');
    }

    public function approval()
    {
        return $this->hasOne(ApprovalDish::class, 'dish_id');
    }

    public function userLogs()
    {
        return $this->hasMany(UserLog::class, 'ref_id');
    }

    public function activeAction()
    {
        return $this->hasMany(UserLog::class, 'ref_id')->whereNull('cancelled_at');
    }

    public function isVoted()
    {
        return $this->hasOne(UserLog::class, 'ref_id')
            ->where('user_id', auth()->user()->id)
            ->where('action', 'Upvote')
            ->whereNull('cancelled_at');
    }

    public function doVote($user)
    {
        DB::beginTransaction();
        try {

            // check if voted already and do cancel
            $active = $this->activeAction()->where('action', 'Upvote')->where('user_id', $user->id)->first();
            if ($active) {

                // save cancel vote at now
                $active->cancelled_at = Carbon::now();
                $active->save();
            } else {

                // new vote
                $this->userLogs()->create([
                    'user_id' => $user->id,
                    'action' => 'Upvote',
                ]);
            }

            // update count of vote
            $this->upvote = $this->activeAction()->where('action', 'Upvote')->count();
            $this->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }
    }

    public function doView($user)
    {
        DB::beginTransaction();
        try {

            // check if view already
            $view = $this->activeAction()->where('action', 'View')->where('user_id', $user->id)->first();
            if (!$view) {
                // new vote
                $this->userLogs()->create([
                    'user_id' => $user->id,
                    'action' => 'View',
                ]);
            }

            // update count of vote
            $this->view_count = $this->activeAction()->where('action', 'View')->count();
            $this->save();

            DB::commit();
        } catch (\Exception $ex) {
            DB::rollback();
            dd($ex);
        }
    }
}
