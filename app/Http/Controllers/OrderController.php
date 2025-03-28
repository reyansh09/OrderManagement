<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $query = Order::with('products');
    
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('order_id', 'like', "%$search%")
                  ->orWhere('buyer_name', 'like', "%$search%")
                  ->orWhere('email', 'like', "%$search%");
        }
    
        $orders = $query->get();
        return view('orders.index', compact('orders'));
    }
    

    public function show($id)
    {
        $order = Order::with('products')->findOrFail($id);
        return view('orders.show', compact('order'));
    }
}
