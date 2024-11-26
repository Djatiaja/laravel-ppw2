<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ApiGalleryController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/gallery",
     *     description="Get all posts with picture",
     *     tags={"Gallery"},
     *     @OA\Response(
     *         response=200,
     *         description="Success",
     *         @OA\JsonContent(
     *             type="array",
     *             @OA\Items(
     *                 type="object",
     *                 @OA\Property(property="id", type="integer", example=1),
     *                 @OA\Property(property="title", type="string", example="Impedit omnis vitae"),
     *                 @OA\Property(property="content", type="string", example="Nemo est velit sapie"),
     *                 @OA\Property(property="picture", type="string", example="posts/FZN9JEP3UYagtjMluLK8y74bMy0jWzNVzZb5Cz3i.jpg"),
     *                 @OA\Property(property="created_at", type="string", example="2024-11-05T19:07:54.000000Z"),
     *                 @OA\Property(property="updated_at", type="string", example="2024-11-05T19:07:54.000000Z")
     *             )
     *         )
     *     )
     * )
     */
    public function getAll()
    {
        $posts  = Post::all();
        return response()->json($posts);
    }

}
