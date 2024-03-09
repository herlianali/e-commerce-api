<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Resources\ProdukShowRequest;

class ProdukController extends Controller
{

    /**
     * @OA\Get(
     *     path="/produk",
     *     operationId="getProdukList",
     *     tags={"Produk"},
     *     summary="Get a list of produk",
     *     description="Returns list of projects",
     *     @OA\Response(
     *         response=200,
     *         description="Everything is fine",
     *         @OA\Items(ref="#/components/schemas/ProdukShowRequest"),
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

    /**
     * @OA\Get(
     *     path="/produk/{id}",
     *     operationId="getProdukById",
     *     tags={"Produk"},
     *     summary="Get produk by ID",
     *     description="Returns project data",
     *     @OA\Parameter(
     *         name="id",
     *         description="The ID of produk",
     *         required=true,
     *         in="path",
     *         @OA\Schema(
     *             type="integer",
     *         ),
     *     ),
     *     @OA\Response(
     *         response=200,
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="App\Models\Produk")
     *     ),
     * )
     *
     */
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
