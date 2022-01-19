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

    public function deals()
    {
        return $this->belongsTo(Deal::class, 'deals_merchants',
            'merchant_id',
            'deal_id');
    }


    }
