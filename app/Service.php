<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $fillable = ['name', 'state', 'category_id'];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo('App\Category');
    }
}
