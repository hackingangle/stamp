<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 黑名单
     * @var array
     */
    protected $guarded = [];
}
