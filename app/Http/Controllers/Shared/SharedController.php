<?php

namespace App\Http\Controllers\Shared;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Facades\DataTables;

class SharedController extends Controller
{

    public $title;
    public $class_instance;
    public $route_name;
    public $view_path;
    public $rules;
    public $table_headers;
    public $columns;
    public $form;

    public function index(Request $request)
    {
        // return $this->currentFiscalYear();
        if ($request->ajax()) {
            $data = $this->class_instance::all()
                ->where('is_deleted', 0);
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                                <a href="' . route("{$this->route_name}.edit", "{$row['id']}") . '">
                                     <button  type="button" class="btn btn-primary" ><i class="ti ti-edit"></i></button>
                                </a>
                                <!-- <a href="' . route("{$this->route_name}.show", "{$row['id']}") . '">
                                    <button  type="button" class="btn btn-primary" ><i class="fa fa-eye"></i></button>
                                 </a>-->
                               <button onclick="del(' . $row['id'] . ')" type="button" class="btn btn-danger" ><i class="ti ti-trash"></i></i></button>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['title'] = $this->title;
        $data['route_name'] = $this->route_name;
        $data['table_headers'] = $this->table_headers;
        $data['columns'] = $this->columns;
        return view($this->view_path . '.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['route_name'] = $this->route_name;
        $data['title'] = $this->title;
        /*
            createForm() :- createes a form araay and set to $form variable of class
        */
        $this->createForm();
        /*
            $data['form'] :- this variable gets the array of form with various fields
            which will be use in the shared view of create as well as edit form
            in which array will be pass to the form compnenet params in the view
        */
        $data['form'] = $this->form;
        return view($this->view_path . '.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($this->class_instance::create($request->all())) {
            session()->flash("success", "Data inserted successfully");
            return redirect()->route("{$this->route_name}.index");
        } else {
            session()->flash("error", "Server Error Code 500");
            return redirect()->route("{$this->route_name}.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['view_only'] = true;
        $data['route_name'] = '#';
        $data['title'] = $this->title;
        $data['data'] = $this->class_instance::find($id);
        /*
                createForm() :- createes a form araay and set to $form variable of class
            */

        // $this->createForm();
        $this->createForm($data['data'], 'put', 'update');
        $data['form'] = $this->form;
        /*
                $data['form'] :- this variable gets the array of form with various fields
                which will be use in the shared view of create as well as edit form
                in which array will be pass to the form compnenet params in the view
            */
        return view($this->view_path . '.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['route_name'] = $this->route_name;
        $data['title'] = $this->title;
        $data['data'] = $this->class_instance::find($id);
        /*
            createForm() :- createes a form araay and set to $form variable of class
        */

        // $this->createForm();
        $this->createForm($data['data'], 'put', 'update');
        $data['form'] = $this->form;
        /*
            $data['form'] :- this variable gets the array of form with various fields
            which will be use in the shared view of create as well as edit form
            in which array will be pass to the form compnenet params in the view
        */
        return view($this->view_path . '.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $instance = $this->class_instance::find($id);

        return ($instance->delete()) ?
            response()->json(
                [
                    'status' => 200,
                    'message' => 'Data has been Deleted Successfully.',
                    'data' => $instance
                ]
            ) : response()->json(
                [
                    'status' => 500,
                    'message' => 'Server Error',
                ]
            );
    }
    public function upload($file)
    {
        $file_name = time() . time() . uniqid() . $file->getClientOriginalName();
        Storage::disk('local')->putFileAs('public/images/', $file, $file_name);
        return $file_name;
    }
}
