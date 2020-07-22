<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;
use App\Restaurant;
use App\Food;

class FoodController extends Controller
{
    public function index() {

    }

    public function create($id) {
        $restaurant = Restaurant::find($id);
        $food = $restaurant->food;
        
        $c = collect(new Menu);
        dd($c);

        
        $menus = Menu::all();

        return view('food/create', [
            'restaurant' => $restaurant,
            'menus' => $menus,
            'food' => $food,
        ]);
    }

    public function store($id, Request $request) {
        $name = $request->name;
        $cena = $request->cena;
        $menu = $request->category;

        Food::create([
            'name' => $name,
            'restaurant_id' => $id,
            'menu_id' => $menu,
            'cena' => $cena
        ]);
        return redirect(route('food.create', $id));
    }

    public function edit() {

    }
}
