<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Restaurant;

class FoodController extends Controller
{
    public function index() {

    }

    public function create($id) {
        $restaurant = Restaurant::find($id);
        $menus = Menu::all();
        return view('food/create', [
            'restaurant' => $restaurant,
            'menus' => $menus
        ]);
    }

    public function store(Request $request) {
        
    }

    public function edit() {

    }
}
