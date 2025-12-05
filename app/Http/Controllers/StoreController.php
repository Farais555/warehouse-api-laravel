<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    //tampilkan semua store
    public function index() {
        $store = Store::paginate(5);

        return response()->json([
            "success" => true,
            "message" => "Get all Store",
            "data" => $store
        ], 200);
    }

    // tambah data
    public function store(Request $request) {
        // 1. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
        ]);

        // 2. cek validator error
        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // // 3. upload image
        // $image = $request->file('photo_product');
        // $image->store('products', 'public');

        // 4. insert data
        $store = Store::create([
            'name' => $request->name,
            'location' => $request->location,
        ]);

        // 5. response
        return response()->json([
            'success' => true,
            'message' => 'Store added successfuly!',
            'data' => $store
        ], 201);
    }

    // ambil salah satu produk
    public function show(string $id) {
        $store = Store::find($id);

        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => "Store not found!",
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Get detail Store',
            'data' => $store
        ], 200);
    }

    // update data
    public function update(string $id, Request $request) {
        // 1. mencari data
        $store = Store::find($id);

        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => "Store not found"
            ], 404);
        }

        // 2. validator
        $validator = Validator::make($request->all(), [
            'name' => 'required|string',
            'location' => 'required|string',
        ]);

        if($validator->fails()) {
            return response()->json([
                "success" => false,
                "message" => $validator->errors()
            ], 422);
        }

        // 3. siapkan data yang ingin diupdate
        $data = [
            'name' => $request->name,
            'location' => $request->location,
        ];

        // // 4. handle image
        // if ($request->hasFile('photo_product')) {
        //     $image = $request->file('photo_product');
        //     $image->store('products', 'public');

        //     if ($product->photo_product) {
        //         Storage::disk('public')->delete('products/' . $product->photo_product);
        //     }

        //     $data['photo_product'] = $image->hashName();
        // }

        // 5. update data baru ke database
        $store->update($data);

        // response saat data berhasil dirubah
        return response()->json([
            'success' => true,
            'message' => 'Store update successfully',
            'data' => $store
        ], 200);
    }

    // delete data
    public function destroy(string $id) {
        $store = Store::find($id);

        if (!$store) {
            return response()->json([
                'success' => false,
                'message' => "Store not found"
            ], 404);
        }

        // if ($product->photo_product) {
        //     // delete dari storage
        //     Storage::disk('public')->delete('products/' . $product->photo_product);
        // }

        $store->delete();
    }
}
