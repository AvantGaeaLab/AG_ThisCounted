<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone_number',
        'password',
        'social_id',
        'social_type',
        'email_verified_at'
    ];

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
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

    public function merchantsFavorite(){
        return $this->BelongsToMany(Merchant::class,'merchants_favorite')->withTimestamps();
    }
    public function merchantFavoriteHas($merchantId){
        return self::merchantsFavorite()->where('merchant_id', $merchantId)->exists();
    }

    public static function search($search){
        return empty($search) ? static::query()
            : static::query()
                ->Where('name', 'like', '%'.$search.'%')
                ->orWhere('email', 'like', '%'.$search.'%')
                ->orWhere('phone_number', 'like', '%'.$search.'%');
    }
}
