<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\FeaturedProduct;
use App\Models\Admin\Product;
use Illuminate\Http\Request;

class FeaturedProductController extends SharedController
{
    public $title = 'Featured Products';
    public $class_instance = FeaturedProduct::class;
    public $route_name = 'featured-product';
    public $view_path = 'shared_view';
    public $rules = [
        'product_id' => 'required|integer|exists:products,id',
    ];
    public $table_headers = [
        'Product Name',
    ];
    public $columns = [
        'product.name',
    ];

    public $relation = ["product"];

    public function createForm($data = null, $method = 'post', $action = 'store')
    {

        $this->form = [
            'route' => route($this->route_name . '.' . $action, (isset($data->id) ? $data->id : null)),
            'method' => $method,
            'fields' =>
            [
                [
                    ['name' => 'product_id', 'label' => 'Product', 'value' => (isset($data->product_id)) ? $data->product_id : null, 'placeholder' => 'Product', 'options' => Product::all()->pluck('name', 'id')],
                ],
            ]
        ];
    }
}
