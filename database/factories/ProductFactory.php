<?php

namespace Database\Factories;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    // protected static function maxFunction(){
    //  $min = 1;
    //  $max = Category::count();
    //  if ($max < $min) {
    //     throw new \Exception('non ci sono categorie in tabella');
    //  }
    // //  return [$min, $max];
    // return fake()->numberBetween($min, $max);
    // }

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $dateTime = fake()->dateTimeBetween()->format('Y-m-d');
        return [
            'name' => fake()->words(2, true),
            'description' => fake()->text(400),
            'image' => fake()->imageUrl(360, 360, 'animals', true),
            'ean_code' => fake()->ean13(),
            'price' => fake()->randomFloat(2, 0, 999),
            'created_at' => $dateTime . ' ' . fake()->time(),
            'updated_at' => fake()->dateTimeBetween($dateTime, 'now')->format('Y-m-d H:i:s'),
            // 'category_id' => self::maxFunction()
            // 'category_id' => fake()->numberBetween(...self::maxFunction())
             'category_id' => fake()->numberBetween(1, Category::count())
        ];
    }
}
