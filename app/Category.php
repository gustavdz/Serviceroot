<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{

    protected $fillable = ['name', 'state',];

    protected $hidden = [];

    public function services()
    {
        return $this->hasMany('App\Service');
    }

}
