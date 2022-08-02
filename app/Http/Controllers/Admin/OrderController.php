<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Shared\SharedController;
use App\Models\Admin\Order;
use App\Models\Admin\Product;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\Contracts\DataTable;
use Yajra\DataTables\Facades\DataTables;

class OrderController extends Controller
{
    public $title = 'Order';
    public $class_instance = Order::class;
    public $route_name = 'order';
    public $view_path = 'shared_view';
    public $rules =
    [
        'status' => 'required|string|max:255',
        'user_id' => 'required|integer',
    ];
    public $table_headers = [
        'Order_id',
        'Status',
        'Payment Method',
        'Payment Status'
    ];
    public $columns = [
        'order_id',
        'status',
        'payment_method',
        'payment_status'=>['name'=>'payment_status','whileTrue'=>'Paid','whileFalse'=>"Not Paid"],
    ];

    public function createForm($data = null, $method = 'post', $action = 'store')
    {

        $this->form = [
            'route' => route($this->route_name . '.' . $action, (isset($data->id) ? $data->id : null)),
            'method' => $method,
            'fields' =>
            [
                [
                    ['disabled' => true, 'name' => 'product_id', 'label' => 'Product', 'value' => (isset($data->product_id)) ? Product::all()->find($data->product_id) : null, 'placeholder' => 'Product', 'options' => Product::all()->pluck('name', 'id')],
                    ['disabled' => true, 'type' => 'number', 'name' => 'quantity', 'label' => 'quantity', 'value' => (isset($data->quantity)) ? $data->quantity : null, 'placeholder' => 'quantity',],
                ],
                [
                    ['options' => ['pending' => 'pending', 'processing' => 'processing', 'completed' => 'completed', 'cancelled' => 'cancelled'], 'name' => 'status', 'label' => 'status', 'value' => (isset($data->status)) ? $data->status : null, 'placeholder' => 'status'],
                    ['disabled' => true, 'options' => ['khalti' => 'khalti', 'cash_on_delivery' => 'cash_on_delivery'], 'name' => 'payment_method', 'label' => 'Payment Method', 'value' => (isset($data->payment_method)) ? $data->payment_method : null, 'placeholder' => 'Payment Method'],
                ]
            ]
        ];
    }
    public function index(Request $request)
    {
        // return $this->currentFiscalYear();
        $data = $this->class_instance::with('product')
            ->where('is_confirmed', 1)
            // ->groupBy('')
            ->get();
        if ($request->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '<div class="text-center">
                                <a href="' . route("{$this->route_name}.edit", "{$row['id']}") . '">
                                     <button  type="button" class="btn btn-primary" ><i class="ti ti-edit"></i></button>
                                </a>
                            </div>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        $data['title'] = $this->title;
        $data['no_create'] = true;
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
        return abort(404, "page not found");
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

        return abort(404, "page not found");
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
        $data['status'] = $request->status;
        if ($data->update()) {
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

    public function cart(Request $request)
    {
        if ($request->ajax()) {
            $validator = Validator::make($request->all(), [
                'product_id' => 'required',
                'quantity' => 'required|min:0',
            ]);
            if ($validator->fails()) {
                return response()->json(
                    [
                        'status' => 400,
                        'message' => 'Bad Request',
                        'data' => $validator->errors()
                    ]
                );
            }
            if ($this->class_instance::create([
                'product_id' => $request->product_id,
                'quantity' => $request->quantity,
                'user_id' => Auth::user()->id,
            ])) {
                $data = $this->class_instance::with('product')->get()->where('user_id', Auth::user()->id)->where('is_confirmed', 0);
                return response()->json(
                    [
                        'status' => 200,
                        'message' => 'Added to cart successfully',
                        'data' => $data,
                        'count' => $data->count()
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 500,
                        'message' => 'Server Error',
                    ]
                );
            }
        }
        return abort(404, "page not found");
    }

    public function confirmOrder(Request $request)
    {
        // dd($request->all());
        // if ($request->ajax()) {
        $validator = Validator::make($request->all(), [
            'order_id' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'payment_method' => 'required'
        ]);
        if ($validator->fails()) {
            return response()->json(
                [
                    'status' => 400,
                    'message' => 'Bad Request',
                    'data' => $validator->errors()
                ]
            );
        }
        $user = User::find(Auth::user()->id);
        $user->address = $request->address;
        $user->phone_number = $request->phone_number;
        $user->update();
        $order = $this->class_instance::all()->where('user_id', Auth::user()->id)->where('is_confirmed', 0);
        if (isset($request->payment) && $request->payment_method == "cod") {
            $payment_method = "cod";
            $order_id = $request->order_id;
            $payment_status = false;
        } else {
            // return $request->epayment;
            /*
            {
    "idx": "8xmeJnNXfoVjCvGcZiiGe7",
    "amount": 1000,
    "mobile": "98XXXXX969",
    "product_identity": "1234567890",
    "product_name": "Dragon",
    "product_url": "http://gameofthrones.wikia.com/wiki/Dragons",
    "token": "QUao9cqFzxPgvWJNi9aKac"
} */
            $payment_method = "epay";
            $order_id = $request->order_id;
            $payment_status = true;
        }
        $order->is_confirmed = 1;
        foreach ($order as $o) {
            $o->update([
                "payment_method" => $payment_method,
                "order_id" => $order_id,
                "payment_status" => $payment_status,
                "is_confirmed" => 1
            ]);
            $status = true;
        }
        if ($status) {
            return "order has been placed";
            return response()->json(
                [
                    'status' => 200,
                    'message' => 'Order Placed Successfully',
                    'data' => $this->class_instance::all()->where('user_id', Auth::user()->id)
                ]
            );
        } else {
            return response()->json(
                [
                    'status' => 500,
                    'message' => 'Server Error',
                ]
            );
        }
        // }
    }
    public function getCartData(Request $request)
    {
        if ($request->ajax()) {
            $data = $this->class_instance::with('product')->get()->where('user_id', Auth::user()->id)->where('is_confirmed', 0);
            return response()->json(
                [
                    'status' => 200,
                    'data' => $data,
                    'count' => $data->count()
                ]
            );
        }
        return abort(404, "page not found");
    }

    public function removeItemCart(Request $request, $id)
    {
        if ($request->ajax()) {

            $item = $this->class_instance::find($id);
            if ($item->delete()) {
                $data = $this->class_instance::with('product')->get()->where('user_id', Auth::user()->id)->where('is_confirmed', 0);
                return response()->json(
                    [
                        'status' => 200,
                        'data' => $data,
                        'count' => $data->count()
                    ]
                );
            } else {
                return response()->json(
                    [
                        'status' => 500,
                        'message' => 'Server Error',
                    ]
                );
            }
        }
    }
    public function checkout()
    {
        Session::put('url.intended', URL::current());
        $data['cart_list'] = $this->class_instance::with('product')->get()->where('user_id', Auth::user()->id)->where('is_confirmed', 0);
        return view('home.checkout', compact('data'));
    }
}
