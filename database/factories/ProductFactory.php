<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
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
            'updated_at' => fake()->dateTimeBetween($dateTime, 'now')->format('Y-m-d H:i:s')
        ];
    }
}
