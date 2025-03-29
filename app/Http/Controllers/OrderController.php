<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    //
    public function index()
    {
        $data = Order::latest()->paginate(3);
        return view('order', compact('data'));
    }


}
