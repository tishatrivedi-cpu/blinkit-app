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
    public function getOrderStatusData()
    {
        // Replace with your sample data or database query
        $orders = Order::all();

        $statusCounts = [
            'In Cart' => 0,
            'Confirmed' => 0,
            'Other' => 0,
        ];

        foreach ($orders as $order) {
            if ($order['status'] == 0) {
                $statusCounts['In Cart']++;
            } elseif ($order['status'] == 1) {
                $statusCounts['Confirmed']++;
            } else {
                $statusCounts['Other']++;
            }
        }

        $total = array_sum($statusCounts);
        $statusPercentages = array_map(function ($count) use ($total) {
            return $total > 0 ? round(($count / $total) * 100, 2) : 0;
        }, $statusCounts);
        return response()->json([
            'counts' => $statusCounts,
            'percentages' => $statusPercentages,
        ]);
    }


    public function status($id)
    {
        $data = Order::find($id);
        $data->status = $data->status + 1;
        $data->save();

        return redirect('/order');
    }
}
