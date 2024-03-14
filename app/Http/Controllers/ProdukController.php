<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use App\Http\Resources\ProdukShowRequest;
<<<<<<< HEAD
=======
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Validator;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> 17fa5b7cf3f3b9a0734bd21262f9f70fdb2f2c51

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
        $res = [
            'message' => 'List Of Produk',
            'data' => $produk,
        ];
        return response()->json($res, Response::HTTP_OK);
    }

    /**
     * @OA\Post(
     *     path="api/produk",
     *     tags={"Produk"},
     *     summary="Add some of produk",
     *     description="Returns adding of projects",
     *     @OA\Response(
     *         response=200,
     *         description="Everything is fine",
     *         @OA\Items(ref="#/components/schemas/ProdukShowRequest"),
     *     ),
     * )
     */
    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'harga'       => ['required','numeric'],
            'kategory'    => ['required'],
            'brand'       => ['required'],
            'size'        => ['required'],
            'color'       => ['required'],
            'rating'      => ['required'],
            'options'     => ['required'],
            'image'       => ['required'],
        ]);

        if ($validate->fails()) {
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        try {
            $produk = Produk::create($request->all());
            $res = [
                'message' => 'Produk Baru Telah Ditambahkan',
                'data'    => $produk,
            ];

            return response()->json($res, Response::HTTP_CREATED);
        } catch(QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    /**
     * @OA\Get(
     *     path="/produk/{id}",
<<<<<<< HEAD
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
=======
     *     tags={"Produk"},
     *     summary="Get produk by ID",
     *     description="Returns project data",
>>>>>>> 17fa5b7cf3f3b9a0734bd21262f9f70fdb2f2c51
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
        $produk = Produk::where('id', $id)->get();
        $res = [
            'message' => 'Ambil Data Produk Dengan Id',
            'data'    => $produk,
        ];

        return response()->json($res, Response::HTTP_OK);
    }

    /**
     * @OA\Put(
     *     path="/produk/{id}",
     *     tags={"Produk"},
     *     summary="Update produk by ID",
     *     description="Returns project data",
     *     @OA\Response(
     *         response=200,
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="App\Models\Produk")
     *     ),
     * )
     *
     */
    public function update(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);

        $validate = Validator::make($request->all(), [
            'nama_produk' => ['required'],
            'harga'       => ['required','numeric'],
            'kategory'    => ['required'],
            'brand'       => ['required'],
            'size'        => ['required'],
            'color'       => ['required'],
            'rating'      => ['required'],
            'options'     => ['required'],
            'image'       => ['required'],
        ]);

        if($validate->fails()){
            return response()->json($validate->errors(), Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        
        try {
            $produk->update($request->all());
            $res = [
                'message' => 'Barang Keluar telah terupdate',
                'data'    => $produk,
            ];

            return response()->json($res, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }

    /**
     * @OA\Delete(
     *     path="/produk/{id}",
     *     operationId="getProdukById",
     *     tags={"Produk"},
     *     summary="Delete produk by ID",
     *     description="Returns project data",
     *     @OA\Response(
     *         response=200,
     *         description="Everything is fine",
     *         @OA\JsonContent(ref="App\Models\Produk")
     *     ),
     * )
     *
     */
    public function destroy($id)
    {
        $produk = Produk::where('id', $id);

        try {
            $produk->delete();
            $res = [
                'message' => 'Produk Telah Terhapus'
            ];

            return response()->json($res, Response::HTTP_OK);

        } catch (QueryException $e) {
            return response()->json([
                'message' => 'Failed ' . $e->errorInfo
            ]);
        }
    }
    
}
