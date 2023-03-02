<?php

namespace Database\Seeders;

use App\Models\Attribute;
use App\Models\attributeValue;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Image;
use App\Models\Product;
use App\Models\User;
use App\Models\Vendor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductAndDependsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products=Product::factory()->has(Vendor::factory()->count(1))
                                   ->has(Comment::factory()->count(6))
                                   ->has(Category::factory()->count(3))
                                   ->has(Image::factory()->count(5))
                                   ->count(100)
                                   ->create();

        $attr=Attribute::factory()->has(attributeValue::factory()->count(3))->count(100)->create();

        foreach($products as $count=>$product)
        {
            $product->attribute()->attach($attr[$count]->id,['value_id'=>$count]);
        }
    }
}
