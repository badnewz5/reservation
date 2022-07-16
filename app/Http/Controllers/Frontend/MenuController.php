<?php

namespace App\Http\Controllers\Frontend;
use App\Models\Menu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    public function index(){
        $menus = Menu::all();
        return view('menus.index', compact('menus'));
    }
}
