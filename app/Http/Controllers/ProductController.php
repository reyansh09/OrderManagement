<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function search(Request $request)
    {
        if ($request->ajax()) {
            $query = $request->get('query');
            $products = Product::where('name', 'LIKE', "%{$query}%")->get();

            $output = '';
            if (count($products) > 0) {
                foreach ($products as $product) {
                    $output .= '
                        <tr>
                            <td><img src="'.$product->image_url.'" width="50"></td>
                            <td>'.$product->name.'</td>
                            <td>₹'.$product->price.'</td>
                        </tr>';
                }
            } else {
                $output = '<tr><td colspan="3" class="text-center">No products found</td></tr>';
            }

            return response()->json(['table_data' => $output]);
        }
    }
}

