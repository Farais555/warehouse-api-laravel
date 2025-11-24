<?php

namespace App\Http\Controllers;

use App\Models\Production;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductionController extends Controller
{
    //tampilkan semua produk
    public function index() {
        $production = Production::with('product')->get();

        if ($production->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Production not found"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all Production",
            "data" => $production
        ]);
    }

    // tambah data
    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'production_date' => 'required|date',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
        ]);

        // 2.cek validator error
        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // 3. insert data
        $production = Production::create([
            'product_id' => $request->product_id,
            'quantity' => $request->quantity,
            'production_date' => $request->production_date,
            'description' => $request->description,
            'user_id' => $request->user_id
        ]);

        // 4.response
        return response()->json([
            "success" => true,
            "message" => 'Production added successfully',
            "data" => $production
        ], 201);
    }

    // ambil salah satu production
    public function show(string $id) {
        $production = Production::with('product')->find($id);

        if (!$production) {
            return response()->json([
                "success" => false,
                "message" => "Production not found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail production",
            "data" => $production
        ], 200);
    }

    // update data production
    public function update(string $id, Request $request) {
        // 1.mencari data
        $production = Production::find($id);

        if (!$production) {
            return response()->json([
                "success" => false,
                "message" => "Production not found"
            ], 404);
        }


        // 2.validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
            'production_date' => 'nullable|date',
            'description' => 'nullable|string',
            'user_id' => 'required|exists:users,id'
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
            'quantity' => $request->quantity,
            'description' => $request->description,
            'user_id' => $request->user_id
        ];

        // 4.update data baru ke database
        $production->update($data);

        // respon saat data berhasil diupdate
        return response()->json([
            'success' => true,
            'message' => 'Production update succesfully',
            'data' => $production
        ]);
    }

    // delete data
    public function destroy(string $id) {
        $production = Production::find($id);

        if (!$production) {
            return response()->json([
                'success' => false,
                'message' => "production not found"
            ], 404);
        }

        $production->delete();

        return response()->json([
            'success' => true,
            'message' => 'Production deleted success'
        ]);
    }


}
