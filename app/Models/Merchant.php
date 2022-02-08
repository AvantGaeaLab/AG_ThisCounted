<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable =[
        'name',
        'merchant_logo'
    ];

    public static function search($search){
        return empty($search) ? static::query()
            : static::query()
                ->Where('name', 'like', '%'.$search.'%');
    }

    public function deals(){
        return $this->hasMany(Deal::class,'merchant_id');
    }


    }
