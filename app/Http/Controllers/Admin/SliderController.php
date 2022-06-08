<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SliderController extends SharedController
{
    public $title = 'Sliders';
    public $class_instance = Slider::class;
    public $route_name = 'slider';
    public $view_path = 'shared_view';
    public $rules = [
        'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',];
    public $table_headers = [
        'Image',

    ];
    public $columns = [
        'image',
    ];

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
// ddd( $validator);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $request->all();
        $data['image'] = $this->upload($request->file('image'));
        if ($this->class_instance::create($data)) {
            session()->flash("success", "Data inserted successfully");
            return redirect()->route("{$this->route_name}.index");
        } else {
            session()->flash("error", "Server Error Code 500");
            return redirect()->route("{$this->route_name}.index");
        }
    }
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $this->class_instance::find($id)->get;
        $data['image'] = $this->upload($request->file('image'));
        if ($data->update($data)) {
            session()->flash("success", "Data updated successfully");
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
                    ['type' => 'file', 'name' => 'image', 'label' => 'First Image', 'value' => (isset($data->image)) ? $data->image: null, 'placeholder' => 'First Image',],
                ]
            ]
        ];
    }
}
