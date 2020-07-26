<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;

use App\Restaurant;
use App\User;
use App\Menu;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $restaurants = Restaurant::all();
        return view('home',[
            'restaurants' => $restaurants
        ]);
    }

    public function show($id) {
        $restaurants = Restaurant::all();
        $restoran = Restaurant::find($id);
        $food = $restoran->food;
        $menus = Menu::all();
    

        $categoriesIds = $food->pluck('menu_id')->unique();
        $categories = Menu::find($categoriesIds);

        return view('home',[
            'restoran' => $restoran,
            'restaurants' => $restaurants,
            'menus' => $menus,
            'food' => $food,
            'categories' => $categories
        ]);
    }
}
