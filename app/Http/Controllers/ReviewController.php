<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ReviewController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "comment"=>"required|min:10|max:100",
                "product_id"=>"required",
            ]
        );

        $review=$request->all();
        if(!isset($request->rating)){
            $review['rating']=5;
        }
        $review['user_id']=Auth::user()->id;
        if(Review::create($review)){
            session()->flash("success", "SuccessfullY");
            // return "SuccessfullY";
            return redirect()->back();
        }else{
            session()->flash("success", "Something went wrong!!!!");
            // return "Something went wrong!!!!";
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

    }
}
