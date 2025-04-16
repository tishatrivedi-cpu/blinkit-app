<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Subcategory;
// use Illuminate\Container\Attributes\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $data = Product::paginate(3);
        return view("product.index", compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $subcategories = Subcategory::get();
        return view('product.create', compact('subcategories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $request->validate(
            [
                "subcategory" => 'required',
                "pname" => 'required',
                "pro_desc" => "required",
                "pro_disc" => "required | min:0",
                "pro_price" => "required | numeric | min:1",
                "pro_pic1" => "required",
                "pro_pic2" => "required",
                "pro_pic3" => "required",
                "self_life" => "required",
                "pro_unit" => "required",
                "pack_type" => "required",
                "countryoforigin" => "required"
            ]
        );

        //
        $img_name1 = "product1_" . time() . "." . $request->pro_pic1->extension();
        $request->pro_pic1->move(public_path('image_uplod'), $img_name1);
        $imgPath1 = "/image_uplod/" . $img_name1;

        $img_name2 = "product2_" . time() . "." . $request->pro_pic2->extension();
        $request->pro_pic2->move(public_path('image_uplod'), $img_name2);
        $imgPath2 = "/image_uplod/" . $img_name2;

        $img_name3 = "product3_" . time() . "." . $request->pro_pic3->extension();
        $request->pro_pic3->move(public_path('image_uplod'), $img_name3);
        $imgPath3 = "/image_uplod/" . $img_name3;

        //table 
        $table = new Product();
        $table->subcategory = $request->subcategory;
        $table->pname = $request->pname;
        $table->pro_desc = $request->pro_desc;
        $table->pro_disc = $request->pro_disc;
        $table->pro_price = $request->pro_price;
        $table->pro_pic1 = $imgPath1;
        $table->pro_pic2 = $imgPath2;
        $table->pro_pic3 = $imgPath3;
        $table->self_life = $request->self_life;
        $table->pro_unit = $request->pro_unit;
        $table->pack_type = $request->pack_type;
        $table->countryoforigin = $request->countryoforigin;

        if (strcmp($request->veg, "on") == 0) {
            $table->veg = true;
        } else {
            $table->nonveg = false;
        }
        $table->save();

        return redirect('/product');
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
        return view('product.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
        $subcategories = Subcategory::get();

        return view('product.edit', compact('product', 'subcategories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Product $product)
    {
        //


        $request->validate(
            [
                "subcategory" => 'required',
                "pname" => 'required',
                "pro_desc" => "required",
                "pro_disc" => "required",
                "pro_price" => "required",
                "self_life" => "required",
                "pro_unit" => "required",
                "pack_type" => "required",
                "countryoforigin" => "required"
            ]
        );

        $table = Product::find($product->_id);
        $table->subcategory = $request->subcategory;
        $table->pname = $request->pname;
        $table->pro_desc = $request->pro_desc;
        $table->pro_disc = $request->pro_disc;
        $table->pro_price = $request->pro_price;
        $table->self_life = $request->self_life;
        $table->pro_unit = $request->pro_unit;
        $table->pack_type = $request->pack_type;
        $table->countryoforigin = $request->countryoforigin;

        if (strcmp($request->veg, "on") == 0) {
            $table->veg = true;
        } else {
            $table->nonveg = false;
        }

        if (isset($request->pro_pic1)) {
            $img_name1 = "product1_" . time() . "." . $request->pro_pic1->extension();
            $request->pro_pic1->move(public_path('image_uplod'), $img_name1);
            $imgPath1 = "/image_uplod/" . $img_name1;
            $table->pro_pic1 = $imgPath1;
        }

        if (isset($request->pro_pic2)) {
            $img_name2 = "product2_" . time() . "." . $request->pro_pic2->extension();
            $request->pro_pic2->move(public_path('image_uplod'), $img_name2);
            $imgPath2 = "/image_uplod/" . $img_name2;
            $table->pro_pic2 = $imgPath2;
        }

        if (isset($request->pro_pic3)) {
            $img_name3 = "product3_" . time() . "." . $request->pro_pic3->extension();
            $request->pro_pic3->move(public_path('image_uplod'), $img_name3);
            $imgPath3 = "/image_uplod/" . $img_name3;
            $table->pro_pic3 = $imgPath3;
        }
        $table->save();
        return redirect('/product')->withSuccess("updated successfully!!!");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
        $product->delete();
        return redirect('product')->withsuccess("Deleted Successfully!!");
    }

    public function search_product(Request $request)
    {
        $request->validate([
            "search" => "required",
        ]);
        $data = DB::table('products')->where('subcategory', 'LIKE', '%' . $request->search . '%')->get();

        return view('product.search', compact('data'));
    }

}