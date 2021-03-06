<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\Inventory;
use App\Models\Admin\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InventoryController extends SharedController
{
    public $title = 'Inventory';
    public $class_instance = Inventory::class;
    public $route_name = 'inventory';
    public $view_path = 'shared_view';
    public $rules =
    [
        'product_id' => 'required|integer|exists:products,id|unique:inventories,product_id,',
        'quantity' => 'required|integer|min:0|max:1000',
    ];
    public $table_headers = [
        'Product Name',
        'Quantity',
    ];
    public $columns = [
        'product.name',
        'quantity',
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
                    ['type' => 'number', 'name' => 'quantity', 'label' => 'quantity', 'value' => (isset($data->quantity)) ? $data->quantity : null, 'placeholder' => 'quantity',],
                    ['name' => 'product_id', 'label' => 'Product', 'value' => (isset($data->product_id)) ? $data->product_id : null, 'placeholder' => 'Product', 'options' => Product::all()->pluck('name', 'id')],
                ],
            ]
        ];
    }
    public function update(Request $request, $id)
    {
        $this->rules['product_id']=$this->rules['product_id'].$id;
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->class_instance::find($id);
        if ($data->update($request->all())) {
            session()->flash("success", "Data updated successfully");
            return redirect()->route("{$this->route_name}.index");
        }
    }

}
