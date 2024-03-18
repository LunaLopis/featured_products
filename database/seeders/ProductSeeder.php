<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    protected function numbCategory()
    {
        // $categories = Category::count();
        // $array_category = [];
        // for ($i = 1; $i <= $categories; $i++) {
        //     $array_category[] = ['category_id' => $i];
        // }

        // return $array_category;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $product = Product::factory()
            ->count(100)
            ->state(new Sequence(
                fn($sequence) => ['in_evidence' => $sequence->index < 5 ? 1 : 0],
            ))
            // ->state(new Sequence(
            //     ...self::numbCategory()
            // ))
            ->create();
    }
}
