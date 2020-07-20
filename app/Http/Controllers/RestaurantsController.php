<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Restaurant;

class RestaurantsController extends Controller
{
    public function index() {
        $restaurants = Restaurant::all();
        return view('restaurants/index', [
            'restaurants' => $restaurants
        ]);
    }

    public function create() {
        return view('restaurants/create');
    }

    public function store(Request $request) {
        $name = $request->name;
        Restaurant::create([
            'name' => $name
        ]);

        return redirect(route('manage.restaurants'));
    }
}
