<?php

namespace Database\Seeders;

use Faker\Generator as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        // $dateTime = $faker->dateTimeBetween()->format('Y-m-d');
        // $categories = Category::all()->pluck('id')->toArray();
        // $product = new Product();
        // $product->category_id = 1;
        // $product->name = $faker->words(2, true);
        // $product->description = $faker->text(400);
        // $product->image = $faker->imageUrl(360, 360, 'animals', true);
        // $product->ean_code = $faker->ean13();
        // $product->price = $faker->randomFloat(2, 0, 999);
        // $product->in_evidence = DB::table('products')->count() <= 5 ? 1 : 0;
        // $product->created_at = $dateTime . ' ' . $faker->time(); 
        // $product->updated_at = $faker->dateTimeBetween($dateTime, 'now')->format('Y-m-d H:i:s');
        // $product->save();


        for ($i=0; $i < 100 ; $i++) { 
            $dateTime = $faker->dateTimeBetween()->format('Y-m-d');
            $categories = Category::all()->pluck('id')->toArray();
            $product = new Product();
            $product->category_id = $faker->numberBetween(1, count($categories));
            $product->name = $faker->words(2, true);
            $product->description = $faker->text(400);
            $product->image = $faker->imageUrl(360, 360, 'animals', true);
            $product->ean_code = $faker->ean13();
            $product->price = $faker->randomFloat(2, 0, 999);
            $product->in_evidence = DB::table('products')->count() < 5 ? 1 : 0;
            $product->created_at = $dateTime . ' ' . $faker->time(); 
            $product->updated_at = $faker->dateTimeBetween($dateTime, 'now')->format('Y-m-d H:i:s');
            $product->save();
        }
    }
}
