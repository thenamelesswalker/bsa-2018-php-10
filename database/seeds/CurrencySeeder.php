<?php

use Illuminate\Database\Seeder;

class CurrencySeeder extends Seeder
{
    public function run()
    {
        factory(\App\Entity\Currency::class, 5)->create();
    }
}
