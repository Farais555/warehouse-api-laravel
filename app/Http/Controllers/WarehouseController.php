<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    //tampilkan semua data warehouse
    public function index() {
        $warehouse = Warehouse::with('product')->get();

        if ($warehouse->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'Warehouse is empty'
            ], 200);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get all data Warehouse',
            'data' => $warehouse
        ], 200);
    }

    // tampilkan salah satu stok di warehouse
    public function show(string $id) {
        $warehouse = Warehouse::with('product')->find($id);

        if (!$warehouse) {
            return response()->json([
                'success' => false,
                'message' => "Stock not found"
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail stock',
            'data' => $warehouse
        ], 200);
    }
}
