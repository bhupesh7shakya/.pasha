<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Admin\Category;
use App\Models\Admin\FeaturedProduct;
use App\Models\Admin\Product;
use App\Models\Admin\Slider;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;

class HomeController extends Controller
{
    public function index()
    {
        Session::put('url.intended', URL::current());
        $data['sliders'] = Slider::all();
        $data['featured_products'] = FeaturedProduct::with('product')->take(3)->get();
        $data['new_arrivals'] = Product::all()->take(3)->sortByDesc('created_at');

        $data['category'] = Category::all()->take(12);
        return view('home.index', compact('data'));
    }
    public function searchResult(Request $request)
    {
        Session::put('url.intended', URL::current());
        $start_time = microtime(true);
        $data['category'] = Category::all();
        $data['search_result'] = Product::query()
            ->with('category',)
            ->when(isset($request->search), function ($query) use ($request) {
                return $query->where('name', 'like', '%' . $request->search . '%');
            })
            ->when(isset($request->category), function ($query) use ($request) {
                return $query->where('category_id', $request->category);
            })
            ->when(($request->min_price && $request->max_price) && $request->min_price < $request->max_price, function ($query) use ($request) {
                return $query->whereBetween('price', [$request->min_price, $request->max_price]);
            })
            ->when(isset($request->filter_by_order), function ($query) use ($request) {
                if ($request->filter_by_order == 'new') {
                    return $query->orderBy('created_at', 'asc');
                }
                return $query->orderBy('price', $request->filter_by_order);
            })
            ->paginate(9);
        $data['number_of_search_result_products'] = $data['search_result']->count();
        $data['recent'] = [
            'sort_by' => $request->filter_by_order,
            'search' => $request->search,
            'category' => $request->category,
            'min_price' => $request->min_price,
            'max_price' => $request->max_price,
            'filter_by_order' => $request->filter_by_order,
        ];
        $data['total_time'] = substr(microtime(true) - $start_time, 0, 8);
        // return $data;
        return view('home.search_result', compact('data'));
    }

    public function product($id)
    {
        Session::put('url.intended', URL::current());
        $data['product'] = Product::find($id);
        $data['reviews'] = Review::with('user')->where('product_id', '=', $id)->get();
        $data['related_product'] = Product::select("*")
            ->where('name', 'like', "%{$data["product"]->name}%")
            ->orWhere('category_id', 'like', "%{$data["product"]->category_id}%")
            ->take(5)
            ->get();
        $data['average_rating'] = Review::all()->where('product_id', '=', $id)->avg('rating');
        return view('home.product', compact('data'));
    }
}
