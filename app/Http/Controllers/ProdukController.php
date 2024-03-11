<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class ProdukController extends Controller
{

    /**
     * @OA\Get(
     *     path="api/produk",
     *     summary="Get a list of produk",
     *     tags={"Produk"},
     *     security={
     *        {"api-key": {}}
     *     },
     *     @OA\Response(
     *         response="200",
     *         description="Everything is fine",
     *         @OA\MediaType(
     *             mediaType="application/json",
     *             @OA\Schema(
     *                 type="array",
     *                 @OA\Items(ref="#/components/schemas/ExampleShowRequest"),
     *             )
     *         )
     *     ),
     * )
     */
    public function index() 
    {
        $produk = Produk::all();
        return response()->json($produk);
    }

    public function store(Request $request)
    {
        $produk = new Produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->harga = $request->harga;
        $produk->kategory = $request->kategory;
        $produk->brand = $request->brand;
        $produk->size = $request->size;
        $produk->color = $request->color;
        $produk->rating = $request->rating;
        $produk->options = $request->options;
        $produk->image = $request->image;
        $produk->save();
        return response()->json([
            'message' => "Produk Berhasil Di Tambahkan"
        ], 201);
    }

    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        if(!empty($produk)) {
            return response()->json($produk);
        }
        else {
            return response()->json([
                'message' => "Produk not found",
            ], 404);
        }
    }

    
}
