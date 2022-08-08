<?php

namespace Database\Seeders;

use App\Models\ColorProduct;
use Illuminate\Database\Seeder;

class ColorProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ColorProduct::factory()
            ->count(60)
            ->create();
    }
}
