<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone_number',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function deals(){
        return $this->hasMany(Deal::class,'user_id');
    }

    public function orders(){
        return $this->hasMany(Order::class,'user_id');
    }



    public function dealsFavorite(){
        return $this->BelongsToMany(Deal::class,'deals_favorite')->withTimestamps();
    }
    public function favoriteHas($dealId){
        return self::dealsFavorite()->where('deal_id', $dealId)->exists();
    }

}
