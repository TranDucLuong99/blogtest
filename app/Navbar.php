<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Navbar extends Model
{
    protected $fillable = ['name', 'content', 'product_id', 'n_order', 'icon'];
}