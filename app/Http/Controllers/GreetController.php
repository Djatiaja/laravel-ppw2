<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GreetController extends Controller
{
    /**
 * @OA\Get(
 *     path="/greet",
 *     summary="Greet the user",
 *     tags={"greeting"},
 *     description="-",
 *     @OA\Parameter(
 *         name="firstname",
 *         in="query",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Parameter(
 *         name="lastname",
 *         in="query",
 *         required=true,
 *         @OA\Schema(
 *             type="string"
 *         ),
 *     ),
 *     @OA\Response(
 *         response=200,
 *         description="Successful response",
 *         @OA\JsonContent(
 *             @OA\Property(
 *                 property="message",
 *                 type="string",
 *                 example="halo John Doe"
 *             )
 *         )
 *     )
 * )
 */
    function index(){
        $firstname = request()->get("firstname");
        $lastname = request()->get("lastname");
        return response(["message"=>"halo ". $firstname. " ".$lastname]);
    }
}
