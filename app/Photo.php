<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fbuid',
        'appid',
        'email',
        'password',
        'imageurl',
        'order_id',
        'wc_order_id'
    ];
}
