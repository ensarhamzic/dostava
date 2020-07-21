<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $fillable = ['name'];

    public function food() {
        return $this->hasMany('App\Food');
    }
}
