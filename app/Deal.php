<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    //soft delete
    use SoftDeletes;
    protected $dates = ['delete_at'];
    //

    protected $fillable =[
        'title',
        'main_pic',
        'pic2',
        'pic3',
        'start_at',
        'end_at',
        'retails_price',
        'price',
        'description',
        'more_info',
        'location',
        'status',
    ];

    //
    public function user(){
        return$this->belongsTo(User::class);
    }

    //M2M between Deal&Category
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Category::class, 'deals_categories',
            'deal_id',
            'category_id');
    }

    //O2M between Merchant&Deals
    public function merchants(){
        return $this->BelongsToMany(Merchant::class, 'deals_merchants',
            'deal_id',
            'merchant_id');
    }

    public function orders(){
        return $this->belongsTo(Order::class,'orders_deals',
            'deal_id',
            'order_id');
    }

}
