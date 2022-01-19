<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable =[
        'title'
        ];

    public function deals(){
        return $this->belongsToMany(Deal::class,'deals_categories',
            'category_id',
            'deal_id');
    }
}
