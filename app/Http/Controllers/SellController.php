<?php

namespace App\Http\Controllers;

use App\Models\Sell;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SellController extends Controller
{
    //tampilkan semua penjualan
    public function index() {
        $sell = Sell::with('product', 'store')->get();

        if ($sell->isEmpty()) {
            return response()->json([
                'success' => true,
                'message' => 'No data sell'
            ], 200);
        }
        
        return response()->json([
            'success' => true,
            'message' => 'Get all data sell',
            'data' => $sell
        ]);
    }

    // tambah data penjualan
    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'quantity' => 'required|integer|min:1',
            'date_sell' => 'required|date',
            'onDuty' => 'required|integer'
        ]);

        // 2.cek validator error
        if($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $sell = Sell::create([
            'product_id' => $request->product_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'date_sell' => $request->date_sell,
            'onDuty' => $request->onDuty,
        ]);

        // 4.response
        return response()->json([
            'success' => true,
            'message' => 'Sell data added successfully',
            'data' => $sell
        ], 201);
    }

    // ambil salah satu data penjualan
    public function show(string $id) {
        $sell = Sell::with('product', 'store')->find($id);

        if (!$sell) {
            return response()->json([
                'success' => false,
                'message' => 'Data sell not found'
            ], 404);
        } 

        return response()->json([
            'success' => true,
            'message' => 'Get detail Sell',
            'data' => $sell
        ], 200);
    }

    // update data penjualan
    public function update(string $id, Request $request) {
        // 1.mencari data
        $sell = Sell::find($id);

        if (!$sell) {
            return response()->json([
                "success" => false,
                "message" => "Data sell not found"
            ], 404);
        }
    

        // 2.validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'quantity' => 'required|integer|min:1',
            'date_sell' => 'required|date',
            'onDuty' => 'required|integer'
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // 3.siapkan data yang ingin diupdate
        $data = [
            'product_id' => $request->product_id,
            'store_id' => $request->store_id,
            'quantity' => $request->quantity,
            'date_sell' => $request->date_sell,
            'onDuty' => $request->onDuty,
        ];

        // 4.update data baru ke database
        $sell->update($data);

        // respon saat data berhasil diupdate
        return response()->json([
            'success' => true,
            'message' => 'Data sell update succesfully',
            'data' => $sell
        ]);
    }  
    
        // delete data
        public function destroy(string $id) {
            $sell = Sell::find($id);

        if (!$sell) {
            return response()->json([
                'success' => false,
                'message' => "Data sell not found"
            ], 404);
        }

        $sell->delete();

        return response()->json([
            'success' => true,
            'message' => 'Data sell deleted success'
        ]);
    }
}
