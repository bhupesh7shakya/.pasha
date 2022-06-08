<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\FeaturedProduct;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $data['sliders'] = Slider::all();
        $data['featured_products'] = FeaturedProduct::with('product')->get();
        $data['new_arrivals'] = Product::all()->take(8)->sortByDesc('created_at');
        $data['category'] = Category::all()->take(12);
        return view('home.index',compact('data'));
    }
}
