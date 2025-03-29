<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Store::paginate(3);
        return view("store.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("store.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                "s_name" => 'required',
                "s_pic" => "required",
                "s_addres" => "required",
                "pincode" => "required",
                "mobileno"=>"required"
            ]
        );        

        $img_name = "s_" . time() . "." . $request->s_pic->extension();
        $request->s_pic->move(public_path('image_uplod'), $img_name);
        $imgPath = "/image_uplod/" . $img_name;

        //insert data into database
        $table = new Store();
        $table->s_name = $request->s_name;
        $table->s_pic = $imgPath;
        $table->s_addres = $request->s_addres;
        $table->pincode = $request->pincode;
        $table->mobileno = $request->mobileno;
        $table->save();
        return redirect('/store');


    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Store $store)
    {
        //
        return view('store.edit', compact('store'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Store $store)
    {

        //update data

        $request->validate(
            [
                "s_name" => 'required',
                "s_addres" => "required",
                "pincode" => "required",
                "mobileno" => "required"
            ]
        );

        $table = Store::find($store->_id);
        $table->s_name = $request->s_name;

        if (isset($request->s_pic)) {
            $img_name = "s_" . time() . "." . $request->s_pic->extension();
            $request->s_pic->move(public_path('image_uplod'), $img_name);
            $imgPath = "/image_uplod/" . $img_name;
            $table->s_pic = $imgPath;
        }
        $table->s_addres = $request->s_addres;
        $table->pincode = $request->pincode;
        $table->mobileno = $request->mobileno;
        $table->save();
        return redirect('store')->withSuccess("update success!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Store $store)
    {
        //
        $store->delete();
        return redirect('store')->withsuccess("Deleted Successfully!!");
    }
}
