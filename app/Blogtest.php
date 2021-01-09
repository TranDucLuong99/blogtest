<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blogtest extends Model
{
    protected $fillable = ['id','categoryId', 'name','title','avatar','description', 'status'];
    public function Product_Type(){
        return $this->belongsTo('App\Category', 'categoryId', 'id');
    }
}
