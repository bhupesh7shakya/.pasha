<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\Category;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ProductController extends SharedController
{
    public $title = 'Products';
    public $class_instance = Product::class;
    public $route_name = 'product';
    public $view_path = 'shared_view';
    public $rules = [
        'name' => 'required|string|max:255|unique:products',
        'size' => 'required|string|max:255',
        'price' => 'required|numeric',
        'category_id' => 'required|integer',
        'description' => 'required|string|max:255',
        'details' => 'required|string|max:900',
        'img_url_first' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        'img_url_second' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        'user_id' => 'required|integer',
    ];
    public $table_headers = [
        'Name',
        'Size',
        'Price',
        'Category',
        'Description',
    ];
    public $columns = [
        'name',
        'size',
        'price',
        'category_id',
        'description',
    ];

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
        // ddd( $request->all());
        $data = $request->all();
        $data['img_url_first'] = $this->upload($request->file('img_url_first'));
        $data['img_url_second'] = $this->upload($request->file('img_url_second'));
        if ($this->class_instance::create($data)) {
            session()->flash("success", "Data inserted successfully");
            return redirect()->route("{$this->route_name}.index");
        } else {
            session()->flash("error", "Server Error Code 500");
            return redirect()->route("{$this->route_name}.index");
        }
    }
    public function createForm($data = null, $method = 'post', $action = 'store')
    {

        $this->form = [
            'route' => route($this->route_name . '.' . $action, (isset($data->id) ? $data->id : null)),
            'method' => $method,
            'fields' =>
            [
                [
                    ['type' => 'text', 'name' => 'name', 'label' => 'Name', 'value' => (isset($data->name)) ? $data->name : null, 'placeholder' => 'Name',],
                    ['name' => 'size', 'label' => 'Size', 'value' => (isset($data->size)) ? $data->size : null, 'placeholder' => 'Size', 'options' => ['S', 'M', 'L', 'XL', 'XXL']],
                ],
                [
                    ['type' => 'number', 'name' => 'price', 'label' => 'Price', 'value' => (isset($data->price)) ? $data->price : null, 'placeholder' => 'Price',],
                    ['name' => 'category_id', 'label' => 'Category', 'value' => (isset($data->category_id)) ? $data->category_id : null, 'placeholder' => 'Category', 'options' => Category::all()->pluck('name', 'id')],
                ],
                [
                    ['type' => 'text', 'name' => 'description', 'label' => 'Description', 'value' => (isset($data->description)) ? $data->description : null, 'placeholder' => 'Description',],
                    [],
                ],
                [
                    ['type' => 'file', 'name' => 'img_url_first', 'label' => 'First Image', 'value' => (isset($data->img_url_first)) ? $data->img_url_first : null, 'placeholder' => 'First Image',],
                    ['type' => 'file', 'name' => 'img_url_second', 'label' => 'First Image', 'value' => (isset($data->img_url_second)) ? $data->img_url_second : null, 'placeholder' => 'Second Image',],
                ],
                [
                    ['type' => 'text', 'name' => 'details', 'label' => 'Details', 'value' => (isset($data->details)) ? $data->details : null, 'placeholder' => 'Details',],

                ]
            ]
        ];
    }
}
