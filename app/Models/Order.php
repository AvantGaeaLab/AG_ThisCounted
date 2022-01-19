<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable =[
        'user_id',
        'deal_id',
        'total',
        'error',
        'quantity',
        'used',
        'status'
    ];

    //relations
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function deals(){
        return $this->BelongsToMany(Deal::class, 'orders_deals',
            'order_id',
            'deal_id');
    }


}
