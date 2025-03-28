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

    public function search(Request $request)
    {
        $query = $request->input('query');
        $searchBy = $request->input('searchBy');
    
        $orders = Order::with('products') // Load products
            ->when($searchBy === 'order_id', function ($q) use ($query) {
                return $q->where('id', 'LIKE', "%$query%");
            })
            ->when($searchBy === 'mobile', function ($q) use ($query) {
                return $q->where('mobile', 'LIKE', "%$query%");
            })
            ->when($searchBy === 'name', function ($q) use ($query) {
                return $q->where('name', 'LIKE', "%$query%");
            })
            ->when($searchBy === 'email', function ($q) use ($query) {
                return $q->where('email', 'LIKE', "%$query%");
            })
            ->get();
    
        if ($orders->isEmpty()) {
            return "<p class='text-danger'>No results found.</p>";
        }
    
        $output = '';
    
        foreach ($orders as $order) {
            // Order Summary Section
            $output .= "<div style='border:1px solid #ccc; padding:10px; margin-bottom:10px;'>
                            <p><strong>Order Date:</strong> " . $order->created_at->format('d-m-Y h:i A') . "</p>
                            <p><strong>Order ID:</strong> <a href='#' style='color:blue;'>{$order->id}</a></p>
                            <p><strong>Payment:</strong> <span style='background:orange; color:white; padding:3px 5px; border-radius:3px;'>{$order->payment_method}</span></p>
                            <p><strong>Total:</strong> ₹{$order->total_price}</p>
                            <p><strong>Buyer Details:</strong><br>
                                {$order->buyer_name}<br>
                                {$order->address}<br>
                                Email: {$order->email}<br>
                                Phone: {$order->mobile}<br>
                                Pincode: {$order->pincode}
                            </p>
                            <button style='background:gray; color:white; padding:5px 10px; border:none; border-radius:3px;'>TRACK</button>
                            <a href='#' style='margin-left:10px; color:blue;'>Generate Invoice</a>
                        </div>";
    
            // Product Details
            foreach ($order->products as $product) {
                $output .= "<div style='border:1px solid #ddd; padding:10px; margin-bottom:10px; display:flex;'>
                                <img src='{$product->image_url}' width='80' height='80' style='margin-right:10px;'>
                                <div>
                                    <a href='#' style='color:blue; font-weight:bold;'>{$product->name}</a>
                                    <p>Model: {$product->model}</p>
                                    <p>Price: ₹{$product->price}</p>
                                    <p>Qty: {$product->pivot->quantity}</p>
                                    <p>Delivery Charge: ₹{$product->delivery_charge}</p>
                                    <p>Status: {$order->status}</p>
                                    <p>Discount: ₹{$product->discount}</p>
                                </div>
                            </div>";
            }
        }
    
        return $output;
    }
    
}
