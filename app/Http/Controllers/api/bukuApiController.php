<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BookResource;
use App\Models\book;
use Illuminate\Http\Request;

/**
 * @OA\Info(
 *     version="1.0.0",
 *     title="Books API",
 *     description="API Documentation for Books",
 *     @OA\Contact(
 *         email="support@example.com"
 *     ),
 *     @OA\License(
 *         name="Apache 2.0",
 *         url="http://www.apache.org/licenses/LICENSE-2.0.html"
 *     )
 * )
 */
class bukuApiController extends Controller
{
    /**
     *    @OA\GET(
     *        path="/api/books",
     *        tags={"books"},
     *        summary="Returns list all book",
     *        description="API for getting all books data",
     *        operationId="booksID", 
     *        @OA\Response(
     *            response="default",
     *            description="succesfull operation", 
     *              @OA\JsonContent(
     *                  type="object",
     *                  @OA\Property(property="message", type="string", example="Book added successfully"),
    *                  @OA\Property(property="data", type="array", @OA\Items(ref="#/components/schemas/BookResource"))
     *              ))
     *    )
     */ 
    
    function index()
    {
        $bukus = book::all();
        return response()->json(["data" => BookResource::collection($bukus)], 200);
    }


    /**
     *  @OA\POST(
     *      path="/api/book/store",
     *      tags={"books"},
     *      summary = "adding book to database",
     *      description ="adding book to database",
     *      operationId = "addBookID",
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\MediaType(
     *              mediaType="multipart/form-data",
     *              @OA\Schema(
     *                  required={"judul", "penulis", "harga", "tanggal_terbit"},
     *                  @OA\Property(property="judul", type="string", maxLength=60),
     *                  @OA\Property(property="penulis", type="string", maxLength=60),
     *                  @OA\Property(property="harga", type="number", format="float"),
     *                  @OA\Property(property="tanggal_terbit", type="string", format="date"),
     *                  @OA\Property(property="sampul_buku", type="file", format="binary")
     *              )
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful operation",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="message", type="string", example="Book added successfully"),
     *              @OA\Property(property="data", type="object", ref="#/components/schemas/BookResource")
     *          )
     *      ),
     *      @OA\Response(
     *          response=400,
     *          description="Bad request",
     *          @OA\JsonContent(
     *              type="object",
     *              @OA\Property(property="error", type="string", example="Invalid input data")
     *          )
     *      )
     *  )
     */

    function store(Request $request)
    {
        $data = $request->validate([
            "judul" => ["required", "max:60"],
            "penulis" => ["required", "max:60"],
            "harga" => ["required", "numeric"],
            "tanggal_terbit" => ["required", "date"],
            "sampul_buku" => ["nullable", "image"]
        ]);

        if ($request->has("sampul_buku")) {
            $original_name = $request->file("sampul_buku")->getClientOriginalName();
            $client_file_name = pathinfo($original_name, PATHINFO_FILENAME);
            $client_file_extention = pathinfo($original_name, PATHINFO_EXTENSION);
            $date = time();
            $file_name = $client_file_name . "_" . $date . "." . $client_file_extention;
            $path = $request->file("sampul_buku")->storeAs("buku", $file_name);
            $data["sampul_buku"] = $path;
        }
        $buku = book::create([
            "judul" => $data["judul"],
            "penulis" => $data["penulis"],
            "harga" => $data["harga"],
            "tanggal_terbit" => $data["tanggal_terbit"],
            "sampul_buku" => isset($data["sampul_buku"]) ? $data["sampul_buku"] : null,
        ]);

        return response()->json(new BookResource($buku), 200);
    }
}
