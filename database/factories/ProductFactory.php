<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
    public function definition()
    {
        $name = $this->faker->words(2, true);
        $type = ['Celana Panjang Pria', 'Celana Panjang Wanita', 'Celana Pendek Pria', 'Celana Pendek Wanita', 'T-shirt', 'Jaket'];
        return [
            'name' => $name, 
            'slug' => Str::slug($name), 
            'type' => $type[random_int(0, 5)], 
            'price' => $this->faker->numerify('#0000'), 
            'quantity' => $this->faker->numberBetween(0, 50), 
            'description' => $this->faker->sentence
        ];
    }
}
