<?php

namespace Database\Factories;

use App\Http\Models\Product;
use App\Http\Models\Transaction;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TransactionDetail>
 */
class TransactionDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $rand_id = \App\Models\Product::OrderBy(DB::raw('RAND()'))->first();
        return [
            'products_id' => $rand_id,
        ];
    }
}
