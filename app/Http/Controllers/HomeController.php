<?php

namespace App\Http\Controllers;
use App\Models\home_types;
use App\Models\products;
use App\Models\categories;
use App\Models\sizes;
use App\Models\types;
use App\Models\testimonials;
use App\Models\partners;
use App\Models\slider;
use App\Models\settings;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //


    public function index(Request $request,$lang='en'){
        $products18=Products::where('carat','=','18')->latest()->take(12)->get();
        $products21=Products::where('carat','=','21')->latest()->take(12)->get();
        $products24=Products::where('carat','=','24')->latest()->take(12)->get();
        $rings=Products::where('catid','=','1')->get();
        $categories=categories::all()->toArray();
        $newProducts = Products::latest()->take(12)->get();
        $sizes=sizes::all()->toArray();
        $testimonials=testimonials::all()->toArray();
        $partners=partners::all()->toArray();
        $sliders=slider::all()->toArray();
        $types=types::all()->toArray();
        $settings=settings::where('st_key','=','cash')->first();
        $homeCategories=home_types::all()->toArray();



        return view('home')
      ->with('products18',  $products18)
      ->with('products21',  $products21)
      ->with('products18',  $products18)
      ->with('products24',  $products24)
      ->with('rings',  $rings)
      ->with('categories',  $categories)
      ->with('newProducts',  $newProducts)
      ->with('sizes',  $sizes)
      ->with('types',  $types)
      ->with('testimonials',  $testimonials)
      ->with('partners',  $partners)
      ->with('sliders',  $sliders)
       ->with('homeCategories',  $homeCategories)
      ->with('cash',  $settings['st_value'])
      ->with('lang',  $lang);
    }
}
