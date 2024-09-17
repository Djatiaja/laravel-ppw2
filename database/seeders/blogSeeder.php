<?php

namespace Database\Seeders;

use App\Models\blog;
use Illuminate\Database\Seeder;

class blogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for ($i=0; $i < 10 ; $i++) { 
            blog::create([
                'Title'=>fake()->sentence(4),
                'Content'=>fake()->sentence(5),
            ]);
        }
    }
}
