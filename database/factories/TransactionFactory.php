<?php

namespace Database\Factories;

use App\Models\Transaction;
use App\Models\TransactionDetail;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Transaction>
 */
class TransactionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $status = ['PENDING', 'FAILED', 'SUCCESS'];
        return [
            'uuid' => $this->faker->uuid(), 
            'name' => $this->faker->name() , 
            'email' => $this->faker->email() , 
            'number' => $this->faker->phoneNumber(), 
            'address' => $this->faker->address(), 
            'transaction_total' => $this->faker->numerify('#00000'), 
            'transaction_status' => $status[random_int(0,2)]
        ];
    }
}
