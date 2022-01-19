<?php

namespace App\Models;

use App\Models\Deal;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;

    use SoftDeletes;
    protected $dates = ['delete_at'];

    protected $fillable =[
        'title'
    ];

    public function deals(){
        return $this->belongsToMany('App\Models\Deal','deals_categories',
            'category_id',
            'deal_id');
    }

}
