<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Subcategory::paginate(3);
        return view("subcategory.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categories = Category::get();
        return view('subcategory.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        $request->validate(
            [
                "subcat_name" => 'required',
                "subcat_pic" => "required"
            ]
        );

        $img_name = "subcat_" . time() . "." . $request->subcat_pic->extension();
        $request->subcat_pic->move(public_path('image_uplod'), $img_name);
        $imgPath = "/image_uplod/" . $img_name;

        //insert data into database
        $table = new Subcategory();
        $table->category = $request->category;
        $table->subcat_name = $request->subcat_name;
        $table->subcat_pic = $imgPath;
        $table->save();
        return redirect('/subcategory');
    }

    /**
     * Display the specified resource.
     */
    public function show(Subcategory $subcategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Subcategory $subcategory)
    {
        //
        $categories = Category::get();

        return view('subcategory.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Subcategory $subcategory)
    {
        //

        $request->validate(
            [
                "subcat_name" => 'required'
            ]
        );

        $table = Subcategory::find($subcategory->_id);
        $table->subcat_name = $request->subcat_name;

        if (isset($request->subcat_pic)) {
            $img_name = "subcat" . time() . "." . $request->subcat_pic->extension();
            $request->subcat_pic->move(public_path('image_uplod'), $img_name);
            $imgPath = "/image_uplod/" . $img_name;
            $table->subcat_pic = $imgPath;
        }
        $table->save();
        return redirect('subcategory')->withSuccess("update success!!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subcategory $subcategory)
    {
        //
        $subcategory->delete();
        return redirect('subcategory')->withsuccess("Deleted Successfully!!");
    }
}
