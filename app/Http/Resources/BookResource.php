<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

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
        'published_at' => $this->tanggal_terbit,
        'created_at' => $this->created_at,
        'updated_at' => $this->updated_at,
    ];
}
}
