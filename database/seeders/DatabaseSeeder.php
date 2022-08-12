<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;
use App\Models\Color;
use App\Models\ColorProduct;
use App\Models\Group;
use App\Models\Product;
use App\Models\ProductImage;
use App\Models\ProductTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
//        Category::factory(10)->create();
//        Group::factory(10)->create();
//        Color::factory(30)->create();
//        Tag::factory()->create();
//        Product::factory(12)->create();
//        ColorProduct::factory()->create();
//        ProductTag::factory()->create();
        ProductImage::factory(30)->create();
    }
}
