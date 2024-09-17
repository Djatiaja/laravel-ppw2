<?php

namespace Database\Seeders;

use App\Models\buku;
use Illuminate\Database\Seeder;

class BUKUSEEDER extends Seeder
{

    public function run(): void
    {
        for ($i=0; $i <10 ; $i++) {
            buku::create([
                'judul' => fake()->sentence(3),
                'penulis' => fake()->name(),
                'harga' => fake()->numberBetween(10000, 100000),
                'tanggal_terbit' => fake()->date()
            ]);
        }
    }
}
