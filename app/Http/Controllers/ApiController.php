<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Person;
use App\Models\Pincode;
use App\Models\Product;
use App\Models\Store;
use App\Models\Subcategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ApiController extends Controller
{
    //
    public function register(Request $request){
        $token = $request->session()->token();

        $token = csrf_token();

        if(!isset($request->username)||
        !isset($request->password)||
        !isset($request->email)||
        !isset($request->mobileno)){
            return
            [
                "status"=>false,
                "message"=>"not Sufficient parameter",
                "person"=>null
            ];

        }else{

            // $request->validate([
            //     "username"=>"required",
            //     "mobileno"=>"required| numeric | digits:10",
            //     "email"=>"required| email",
            //     "password"=>"required | min:6 | max:10"
            // ]);

            $table=new Person();
            $table->username=$request->username;
            $table->email = $request->email;
            $table->mobileno = $request->mobileno;
            $table->password = $request->password;
            $table->status=$request->true;
            $table->save();

            return [
                "status" => true,
                "message" => "Register successfilly",
                "person" => $table
            ];
        }

    }

    public function login_user(Request $request){
        if(isset($request->email)&& isset($request->password)){
            $table=Person::where('email', $request->email)
            ->where('password',$request->password)->where('status', true)
            ->first();

            if(isset($table)){
                return[
                    "status" => true,
                    "message" => "login successfully",
                    "person" => $table
                ];
            }else{
                return[
                    "status" => false,
                    "message" => "user not found",
                    "person" => null
                ];

            }

        }else{
            return[
                "status" => false,
                "message" => "not sufficient parameter",
                "person" => null
            ];
        }
    }

    public function getdata(){
        $banner_data=Banner::where('status',true)->get();
        $category_data=Category::get();
        $coupon_data=Coupon::where('status',true)->get();
        $pincode_data=Pincode::get();
        $store_data=Store::get();
        $product_data=Product::get();
        $sub_data=Subcategory::get();
        $store_data=Store::get();

        return[

            "status"=>true,
            "message"=>"Data Get Successfully!!!",
            "banner_data"=> $banner_data,
            "category_data"=> $category_data,
            "coupon_data"=> $coupon_data,
            "pincode_data"=> $pincode_data,
            "store_data"=> $store_data,
            "product_data"=>$product_data,
            "sub_data"=> $sub_data,
            "store_data"=>$store_data
        ];
    }

    public function addorder(Request $request)
    {
        $uid = $request->uid;
        $pid = $request->pid;
        $data = Order::where('uid', $uid)
            ->where('pid', $pid)
            ->where('status', 0)->first();
        if ($data == null) {
            $table = new Order();
            $product = Product::find($pid);
            $table->pid = $pid;
            $table->uid = $uid;
            $table->pname = $product->pname;
            $table->pic1 = $product->pro_pic1;
            $table->qty = 1;
            $table->amount = (int)$product->pro_price;
            $table->tot_amount = (int)$product->pro_price;
            $table->c_discount = (int)$request->c_discount;
            $table->date = $request->date;
            $table->time = $request->time;
            $table->status = 0;
            $table->c_o = $request->c_o;
            $table->c_code = $request->c_code;
            $table->address = $request->address;
            $table->pro_unit=$request->pro_unit;
            $table->save();


            $data = Order::where('uid', $uid)
                ->where('status', 0)->get();
            return [
                "status" => true,
                "message" => "Added to cart",
                "order" => $data
            ];
        } else {
            $data->qty = $request->qty;
            $data->tot_amount = (int)$request->qty * (int) $request->amount;
            $data->save();
            $data = Order::where('uid', $uid)

                ->where('status', 0)->get();

            return [
                "status" => true,
                "message" => "Added to cart",
                "order" => $data
            ];
        }
    }

    public function getorder(Request $request)
    {

        $data = Order::where('uid', $request->uid)
            ->where('status',(int) $request->status)->get();

        return [
            "status" => true,
            "message" => "Added to cart",
            "order" => $data
        ];
    }

    public function updateQty(Request $request)
    {

        $id = $request->id;
        $uid = $request->uid;
        $data = Order::find($id);

        $data->qty = (int) $request->qty;
        $data->tot_amount = (int)$request->qty * (int) $data->amount;
        $data->save();


        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        return [
            "status" => true,
            "message" => "update",
            "order" => $data
        ];
    }

    public function removeOrder(Request $request) {
        $data = Order::where('uid',$request->uid)
            ->where('_id',$request->id)
            ->first();

        $data->delete();

        return [
            "status" => true,
            "message" => "update",
            "order" => $data
        ];
    }

    public function confirmOrder(Request $request)
    {
        $uid = $request->uid;
        $time = Carbon
        
        ::now()->format('H:i');
        $date = Carbon::now()->format('d/m/Y');

        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        foreach ($data as $item) {
            $item->status = 1;
            $item->address = $request->address;
            $item->c_code = $request->c_code;
            $item->c_o = $request->c_o;
            $item->time = $time;
            $item->date = $date;
            $item->c_discount = $request->c_discount;
            $item->save();
        }
        $data = Order::where('uid', $uid)
            ->where('status', 0)->get();
        return [
            "status" => true,
            "message" => "Order placed successfully",
            "order" => $data
        ];
    }

    public function getCouponFromCode(Request $request)
    {
        if (isset($request->code)) {
            $table = coupon::where('c_code', $request->code)->first();

            if (isset($table)) {
                return [
                    'status' => true,
                    'message' => 'Coupon Applyed',
                    'coupon_data' => $table
                ];
            } else {
                return [
                    'status' => false,
                    'message' => 'Invalid Coupon Code',
                    'coupon_data' => null
                ];
            }
        } else {
            return [
                'status' => false,
                'message' => 'Insufficient parameters',
                'coupon_data' => null
            ];
        }
    }

    public function getOrderhistory(Request $request)
    {

        $data = Order::where('uid', $request->uid)
            ->where('status', '>=', 1) ->get();
        return [
            "status" => true,
            "message" => "getting cart",
            "order" => $data
        ];
    }

    public function editprofile(Request $request)
    {

        $user = Person::find($request->uid);
        $user->email = $request->email;
        $user->mobileno = $request->mobileno;
        $user->username = $request->username;

        $user->save();

        return [
            "status" => true,
            "message" => "profile updated Successfully!!!",
            "person" => $user
        ];
    }

}
