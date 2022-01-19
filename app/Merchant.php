<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Merchant extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];


    protected $fillable =[
        'name',
        'merchant_logo'
    ];

    //O2M between Merchant&Deals

    public function deals(){
        return $this->belongsTo(Deal::class,'deals_merchants',
            'merchant_id',
            'deal_id');
    }
}
