<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Banner;
use App\Models\Category;
use App\Models\Coupon;
use App\Models\Order;
use App\Models\Person;
use App\Models\Product;
use App\Models\Store;
use App\Models\Subcategory;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\Return_;

class AdminController extends Controller
{
    //
    public function open_login(){

        return view('login');
    }

    public function login(Request $request){

        $request->validate([
            'username'=>"required",
            'password' => "required",
        ]);

        $data=Admin::where("username",$request->username)
        ->where('password',$request->password)->first();

        if($data!=null){
            session()->put("user",$data);
            return redirect('home');
        }else{
            // return back()->with('invalid username or password');
            return back()->withErrors(['login_error' => 'Invalid username or password']);
        }

    }

    public function open_register() {

        return view('register');
    }

    public function register(Request $request)
    {
        //Validate the incoming request data
        $request->validate([
            "username" => "required|unique:admins",
            "password" => "required|min:6|max:8",
            "email" => "required|email",
            "mobileno" => "required|numeric|digits:10",
            "answer" => "required"  // Answer should just be required, not unique
           
              
        ]);

        // Create the admin entry
        $admin = new Admin();
        $admin->username = $request->username;
        $admin->password = $request->password;  // Hash the password
        $admin->email = $request->email;
        $admin->mobileno = $request->mobileno;
        $admin->role = $request->role;
        $admin->sec_que = $request->sec_que;
        $admin->answer = $request->answer;
        $admin->save();

        return redirect('/')->withSuccess('Registered successfully');
    }


    public function home(){

        $category_count=Category::count();
        $order_count = Order::count();
        $ba_count=Banner::where('status',true)->count();
        $bd_count = Banner::where('status', false)->count();
        $subcat_count = Subcategory::count();
        $product_count = Product::count();
        $store_count=Store::count();
        $ca_count = Coupon::where('status', true)->count();
        $cd_count = Coupon::where('status', false)->count();
        $user_count=Person::count();
        $orders = Order::where('status', 1)->latest()->get();
        $user = Person::all();
        $r = Order::where('status', 1)->sum('tot_amount');
        $product = Product::latest()->paginate(6);
        return view('home',compact('category_count', 'order_count', 'ba_count', 'bd_count', 'subcat_count', 'product_count', 'store_count', 'ca_count', 'cd_count', 'user_count', 'orders' , 'user','r', 'product'));

    }

    public function open_forgot_pwd(){
        return view(('forgotpassword'));

    }

    public function open_cpwd(){
        return view('cpwd');

    }

    public function logout(){

        session()->flush();
        return redirect('/');

    }

    public function forgot_password(Request $request){
        $data=Admin::where('username',$request->username)
        ->where("sec_que",$request->sec_que)
        ->where("answer",$request->answer)->first();

        if($data=null){
            return redirect('/');

        }else{
            $username=$request->username;
            return view('resetpassword',compact('username'));
        }

    }

    public function reset_password(Request $request){

        //  $request->validate([
        //      "newpass"=>"required",
        //      "conpass"=>"required| same: newpass"
        // ]);

        $table=Admin::where('username',$request->username)->first();
        $table->password=$request->newpass;
        $table->save();

        return redirect('/');

    }

    // public function update_profile(Request $request, Admin $admin){
    //     $table=Admin::find($admin->_id);

    //     $admin->username = $request->username;
    //     $admin->email = $request->email;
    //     $admin->mobileno = $request->mobileno;
    //     $table->save();

    //     return redirect('/home');

    // }

    public function edit_profile(Request $request){


        $request->validate([
            "username"=>"required",
            "email" => "required",
            "mobileno" => "required|numeric|digits:10"
        ]);


        $data=Session()->get('user');

        $table=Admin::find($data->_id);
        $table->username=$request->username;
        $table->email = $request->email;
        $table->mobileno = $request->mobileno;
        $table->save();
        session()->put('user',$table);
        return redirect('/home')->with('success','your profile is edited successfully');
        


    }

    public function open_profile()
    {
        return view(('profile'));
    }

    public function open_changepassword()
    {
        return view(('changepassword'));
    }

    public function changepassword(Request $request)
    {

        $request->validate([
                 "oldpass"=>"required",
                "newpass"=>"required",
                    "conpass"=>"required|same:newpass"
             ]);

            $data = Session()->get('user');

        $table = Admin::find($data->_id);
        $table->password=$request->newpass;
        $table->save();
        session()->put('user', $table);
        return redirect('/home')->with('success', 'your Password is change successfully');
    }

    public function search(Request $request)
    {
        // Access the 'query' parameter from the request
        $query = $request->input('query'); // Use input() to get the query parameter
    
        // Search across multiple columns in the 'products' table
        $data = Product::where('pname', 'like', "%$query%")
            ->orWhere('subcategory', 'like', "%$query%")
            ->orWhere('pro_desc', 'like', "%$query%")
            ->orWhere('pro_price', 'like', "%$query%")
            ->get();
    
        return view('search-results', compact('data'));
    }
    
}

 