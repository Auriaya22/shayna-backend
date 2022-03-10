<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Factory;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        \App\Models\Product::factory(3)->create();
        // \App\Models\Transaction::factory(10)->create();

        // insert records to Transaction and TransactionDetail
        \App\Models\Transaction::factory()->count(5)->create()->each(function ($trx) {        
            $trxDetail = \App\Models\TransactionDetail::factory()->count(random_int(1,5))->make();
            $trx->details()->saveMany($trxDetail);
        });

    }
}
