<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //tampilkan semua produk
    public function index() {
        $product = Product::all();

        if ($product->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Product not found!"
        ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all Product",
            "data" => $product
        ]);
    }

}
