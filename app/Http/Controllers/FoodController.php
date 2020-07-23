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
        $menus = Menu::all();
    

        $categoriesIds = $food->pluck('menu_id')->unique();

        $categories = Menu::find($categoriesIds);
        

        return view('food/create', [
            'restaurant' => $restaurant,
            'menus' => $menus,
            'food' => $food,
            'categories' => $categories
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

    public function edit($id) {
        $jelo = Food::find($id);
        $menus = Menu::all();
        return view('food/edit',[
            'jelo' => $jelo,
            'menus' => $menus
        ]);
    }

    public function update($id, Request $request) {
        $name = $request->name;
        $cena = $request->cena;
        $menu = $request->category;

        $food = Food::find($id);
        if($food->name != $name) {
            $food->name = $name;
        }

        if($food->cena != $cena) {
            $food->cena = $cena;
        }

        if($food->menu_id != $menu) {
            $food->menu_id = $menu;
        }

        $food->save();
        return redirect(route('food.create', $food->restaurant));
    }

    public function destroy($id){
        $food = Food::find($id);
        $restaurant = $food->restaurant;
        $food->delete();
        return redirect(route('food.create', $restaurant));
    }
}
