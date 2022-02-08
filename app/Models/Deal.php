<?php

namespace App\Models;

use App\Models\Category;
use App\Models\Merchant;
use App\Models\Order;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Deal extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable =[
        'title',
        'merchant_id',
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

    #Scopes
    public function scopeValidDeal($query){
        return $query->where('status', 'Valid');
    }
    public function scopeExpiredDeal($query){
        return $query->where('status', 'Expired');
    }
    public function scopeDeletedDeal($query){
        return $query->where('status', 'Deleted');
    }

    public function scopefindCat($query, $catId){
        return $query->whereRelation('categories', 'id' , $catId);
    }

    public static function search($search){
        return empty($search) ? static::query()
            : static::query()->where('id', 'like', '%'.$search.'%')
                ->orWhere('title', 'like', '%'.$search.'%');
    }

    #Relations
    public function user(){
        return$this->belongsTo(User::class);
    }
    public function merchant(){
        return$this->belongsTo(Merchant::class, 'merchant_id');
    }
    //M2M between Deal&Category
    public function categories(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->BelongsToMany(Category::class, 'deals_categories',
            'deal_id',
            'category_id');
    }
    public function orders(){
        return $this->belongsTo(Order::class,'orders_deals',
            'deal_id',
            'order_id');
    }

}
