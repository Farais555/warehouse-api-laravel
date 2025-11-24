<?php

namespace App\Http\Controllers;

use App\Models\Income;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IncomeController extends Controller
{
    //tampilkan data
    public function index() {
        $income = Income::with('product', 'store')->get();

        if ($income->isEmpty()) {
            return response()->json([
                "success" => true,
                "message" => "Income data not found"
            ], 200);
        }

        return response()->json([
            "success" => true,
            "message" => "Get all Income data",
            "data" => $income
        ]);
    }

   // tambah data
    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'sold' => 'required|numeric',
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
        $income = Income::create([
            'product_id' => $request->product_id,
            'store_id' => $request->store_id,
            'sold' => $request->sold,
            'user_id' => $request->user_id
        ]);

        // 4.response
        return response()->json([
            "success" => true,
            "message" => 'Income data added successfully',
            "data" => $income
        ], 201);
    }

    // ambil salah satu data penghasilan
    public function show(string $id) {
        $income = Income::with('product', 'store')->find($id);

        if (!$income) {
            return response()->json([
                "success" => false,
                "message" => "Income data not found"
            ], 404);
        }

        return response()->json([
            "success" => true,
            "message" => "Get detail Income data",
            "data" => $income
        ], 200);
    }

    // update data production
    public function update(string $id, Request $request) {
        // 1.mencari data
        $income = Income::find($id);

        if (!$income) {
            return response()->json([
                "success" => false,
                "message" => "Income data not found"
            ], 404);
        }


        // 2.validator
        $validator = Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'store_id' => 'required|exists:stores,id',
            'sold' => 'required|numeric',
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
            'store_id' => $request->store_id,
            'sold' => $request->sold,
            'user_id' => $request->user_id
        ];

        // 4.update data baru ke database
        $income->update($data);

        // respon saat data berhasil diupdate
        return response()->json([
            'success' => true,
            'message' => 'Income data update succesfully',
            'data' => $income
        ]);
    }

    // delete data
    public function destroy(string $id) {
        $income = Income::find($id);

        if (!$income) {
            return response()->json([
                'success' => false,
                'message' => "Income data not found"
            ], 404);
        }

        $income->delete();

        return response()->json([
            'success' => true,
            'message' => 'Income data deleted success'
        ]);
    }
}
