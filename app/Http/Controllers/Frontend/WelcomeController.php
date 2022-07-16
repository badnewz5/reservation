<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(){
        // $specials = Category::where('name', 'specials')->firtst();
        $specials = Menu::with('categories')->get();
        $settings = Setting::all();
        return view('welcome', compact('specials','settings'));
    }
    public function about(){
        return view('about');
    }
}
