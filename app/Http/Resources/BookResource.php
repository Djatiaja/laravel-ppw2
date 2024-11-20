<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @OA\Schema(
 *     schema="BookResource",
 *     type="object",
 *     title="Book Resource",
 *     description="Schema for book details",
 *     @OA\Property(property="id", type="integer", example=1),
 *     @OA\Property(property="judul", type="string", example="The Great Gatsby"),
 *     @OA\Property(property="penulis", type="string", example="F. Scott Fitzgerald"),
 *     @OA\Property(property="harga", type="number", format="float", example=10.99),
 *     @OA\Property(property="tanggal_terbit", type="string", format="date", example="1925-04-10"),
 *     @OA\Property(property="sampul_buku_url", type="string", format="url", example="https://example.com/sampul.jpg")
 * )
 */

class BookResource extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
public function toArray(Request $request): array
{
    return 
        [
        'id' => $this->id,
        'title' => $this->judul,
        'author' => $this->penulis,
        'harga' => $this->harga,
        'published_at' => $this->tanggal_terbit,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
}
}
