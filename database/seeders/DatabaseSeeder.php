<?php

namespace Database\Seeders;

use App\Models\Merchant;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(2)->create();
        Merchant::factory(1000)->create()
        ->each(function($merchant) {
            Product::factory(1)->create([
                'merchant_id' => $merchant->id,
            ]);
        });
    }
}
