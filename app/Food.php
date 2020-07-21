<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Food extends Model
{
    protected $fillable = ['name', 'restaurant_id', 'menu_id', 'cena'];

    public function restaurant() {
        return $this->belongsTo('App\Restaurant');
    }

    public function menu(){
        return $this->belongsTo('App\Menu');
    }
}
