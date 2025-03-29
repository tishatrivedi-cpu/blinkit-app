<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Banner::paginate(3);
        return view("banner.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("banner.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                "banner_name" => 'required',
                "banner_pic" => "required"
            ]
        );
       
        $img_name = "banner_" . time() . "." . $request->banner_pic->extension();
        $request->banner_pic->move(public_path('image_uplod'), $img_name);
        $imgPath = "/image_uplod/" . $img_name;

         //inser code
        $table = new Banner();
        $table->banner_name = $request->banner_name;
        $table->banner_pic = $imgPath;
        if (strcmp($request->status, "on") == 0 ){

            $table->status=true;
        }else{

            $table->status = false;
        }
        $table->save();
        return redirect('/banner')->withSuccess("insert successfully");

    }

    /**
     * Display the specified resource.
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Banner $banner)
    {
        //
        return view('banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Banner $banner)
    {
        //update code

        $request->validate([
            "banner_name" => "required"
        ]);

        $table = Banner::find($banner->_id);
        $table->banner_name = $request->banner_name;

        if (isset($request->banner_pic)) {
            $img_name = "cat" . time() . "." . $request->banner_pic->extension();
            $request->banner_pic->move(public_path('image_uplod'), $img_name);
            $imgPath = "/image_uplod/" . $img_name;
            $table->banner_pic = $imgPath;
        }
        if (strcmp($request->status, "on") == 0) {

            $table->status = true;
        } else {

            $table->status = false;
        }

        $table->save();
        return redirect('banner')->withSuccess("update success!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Banner $banner)
    {
        //delete code

        $banner->delete();
        return redirect('banner')->withsuccess("Deleted Successfully!!");

    }
}
