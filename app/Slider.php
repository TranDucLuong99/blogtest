<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['id', 'name','avatar', 'description', 'status' ];
}
