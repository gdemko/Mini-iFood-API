<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ordered extends Model
{
    protected $fillable = [
        'user_id',
        'value_total',
        'number',
        'description',
    ];

    public function products()
    {
        return $this->belongsToMany('App\Product')->withPivot('value')->withTimestamps();
    }
}
