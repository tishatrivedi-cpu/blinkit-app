<?php

namespace App\Http\Controllers;

use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Coupon::paginate(3);
        return view("coupon.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("coupon.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                "c_code" => 'required',
                "c_desc" => "required",
                "c_title" => "required",
                "c_discount" => "required",
                "c_maxamt" => "required",
                "c_pic" => "required"
            ]
        );

        $img_name = "c_" . time() . "." . $request->c_pic->extension();
        $request->c_pic->move(public_path('image_uplod'), $img_name);
        $imgPath = "/image_uplod/" . $img_name;

        //insert data into database
        $table = new Coupon();
        $table->c_code = $request->c_code;
        $table->c_desc = $request->c_desc;
        $table->c_title = $request->c_title;
        $table->c_discount = $request->c_discount;
        $table->c_maxamt = $request->c_maxamt;
        $table->c_pic = $imgPath;
        if (strcmp($request->status, "on") == 0) {

            $table->status = true;
        } else {

            $table->status = false;
        }
        $table->save();
        return redirect('/coupon');

    }

    /**
     * Display the specified resource.
     */
    public function show(Coupon $coupon)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Coupon $coupon)
    {
        //
        return view('coupon.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Coupon $coupon)
    {
        //update code

        $request->validate(
            [
                "c_code" => 'required',
                "c_desc" => "required",
                "c_title" => "required",
                "c_discount" => "required",
                "c_maxamt" => "required"
            ]
        );

        $table = Coupon::find($coupon->_id);
        $table->c_code = $request->c_code;
        $table->c_desc = $request->c_desc;
        $table->c_title = $request->c_title;
        $table->c_discount = $request->c_discount;
        $table->c_maxamt = $request->c_maxamt;

        if (isset($request->c_pic)) {
            $img_name = "c" . time() . "." . $request->c_pic->extension();
            $request->c_pic->move(public_path('image_uplod'), $img_name);
            $imgPath = "/image_uplod/" . $img_name;
            $table->c_pic = $imgPath;
        }
        if (strcmp($request->status, "on") == 0) {

            $table->status = true;
        } else {

            $table->status = false;
        }

        $table->save();
        return redirect('coupon')->withSuccess("update success!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Coupon $coupon)
    {
        //
        $coupon->delete();
        return redirect('coupon')->withsuccess("Deleted Successfully!!");
    }
}
