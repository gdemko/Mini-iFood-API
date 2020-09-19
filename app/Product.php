<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'value',
        'description',
    ];

    /**
     * The roles that belong to the user.
     */
    public function ordered()
    {
        return $this->belongsToMany('App\Ordered');
    }
}
