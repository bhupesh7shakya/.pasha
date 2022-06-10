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
        $data['featured_products'] = FeaturedProduct::with('product')->take(3)->get();
        $data['new_arrivals'] = Product::all()->take(3)->sortByDesc('created_at');

        $data['category'] = Category::all()->take(12);
        return view('home.index', compact('data'));
    }
    public function searchResult(Request $request)
    {
        $start_time = microtime(true);
        $data['category'] = Category::all();
        $data['search_result'] = Product::query()
            ->with('category')
                ->when($request->search, function ($query) use ($request) {
                    return $query->where('name', 'like', '%' . $request->search . '%');
                })
                ->when($request->category, function ($query) use ($request) {
                    return $query->where('category_id', $request->category);
                })
                ->when(($request->min_price && $request->max_price) && $request->min_price < $request->max_price, function ($query) use ($request) {
                    return $query->whereBetween('price', [$request->min_price, $request->max_price]);
                })
                ->when($request->filter_by_order, function ($query) use ($request) {
                    if($request->filter_by_order == 'new'){
                        return $query->orderBy('created_at', 'asc');
                    }
                    return $query->orderBy('price',$request->filter_by_order);
                })
            ->paginate(9);
        $data['number_of_search_result_products'] = $data['search_result']->count();
        $data['total_time'] = substr(microtime(true) - $start_time, 0, 8);
        // return $data;
        return view('home.search_result', compact('data'));
    }
}
