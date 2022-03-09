<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\ProductGallery>
 */
class ProductGalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $file_path = 'public/storage/assets/product';
        // dd($file_path);
        return [
            'photo' => $this->faker->image($file_path, 640, 480, null, false), 
            'is_default' => 0
        ];
    }
}
