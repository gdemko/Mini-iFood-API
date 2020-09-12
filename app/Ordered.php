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
}
