<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Sequence;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $categories = Category::count();
        $array_category = [];
        for ($i=1; $i <= $categories; $i++) { 
            $array_category[] = ['category_id'=> $i];
        }

        $product = Product::factory()
                ->count(100)
                ->state(new Sequence(
                    fn ($sequence) => ['in_evidence' => $sequence->index < 5 ? 1 : 0],
                ))
                ->state(new Sequence(
                 ...$array_category   
                ))
                ->create();
    }
}
