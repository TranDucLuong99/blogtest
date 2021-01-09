<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['id','categoryId', 'name','title','avatar','price', 'old_price', 'discount','description','amount', 'status'];
    public function Product_Type(){
        return $this->belongsTo('App\Category', 'category_id', 'id');
    }
}
