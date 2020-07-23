<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['category'];

    public function food() {
        return $this->hasMany('App\Food');
    }

    
}
