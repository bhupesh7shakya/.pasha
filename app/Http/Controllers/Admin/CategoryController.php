<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\Category;
use Illuminate\Http\Request;

class CategoryController extends SharedController
{
    public $title = 'Categories';
    public $class_instance = Category::class;
    public $route_name = 'category';
    public $view_path = 'shared_view';
    public $rules = [
        'name' => 'required|string|max:255|unique:categories',
        'user_id' => 'required|integer',
    ];
    public $table_headers = [
        'Name',
    ];
    public $columns = [
        'name',
    ];
    public function createForm($data = null,$method='post',$action='store')
    {

        $this->form = [
            'route' => route($this->route_name . '.'.$action,(isset($data->id)?$data->id:null)),
            'method' => $method,
            'fields' =>
            [
                [
                    ['type'=>'text','name'=>'name','label'=>'Name','value'=>(isset($data->name))?$data->name:null,'placeholder'=>'Name',],
                ],
            ]
        ];

    }
}
