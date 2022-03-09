<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    use RefreshDatabase;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $price_list = [10000, 20000, 30000, 40000, 50000, 60000, 70000, 80000, 90000];
        $name = $this->faker->words(2, true);
        $type = ['Celana Panjang Pria', 'Celana Panjang Wanita', 'Celana Pendek Pria', 'Celana Pendek Wanita', 'T-shirt', 'Jaket'];
        return [
            'name' => $name, 
            'slug' => Str::slug($name), 
            'type' => $type[random_int(0, 5)], 
            'price' => $price_list[random_int(0, 8)], 
            'quantity' => $this->faker->numberBetween(0, 50), 
            'description' => $this->faker->sentence
        ];
    }
}
