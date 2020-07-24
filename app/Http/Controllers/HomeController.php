<?php

namespace App\Http\Controllers;

use Gate;
use Illuminate\Http\Request;

use App\Restaurant;
use App\User;

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
}
