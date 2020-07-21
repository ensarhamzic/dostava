<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Menu;

class MenusController extends Controller
{
    public function index() {
        $menus = Menu::all();
        return view('menus/index', [
            'menus' => $menus
        ]);
    }
    
    public function create() {
        return view('menus/create');
    }

    public function store(Request $request) {
        $name = $request->name;
        Menu::create([
            'category' => $name
        ]);
        return redirect(route('menu.index'));
    }
}
