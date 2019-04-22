<?php

use Illuminate\Database\Seeder;
use App\Models\credit;
use App\Models\Client;


class CreditSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(credit::class,1)->create([
            'client_id'=>1
        ]);
        factory(credit::class,1)->create([
            'client_id'=>2
        ]);
        factory(credit::class,1)->create([
            'client_id'=>3
        ]);
        factory(credit::class,1)->create([
            'client_id'=>4
        ]);
        factory(credit::class,1)->create([
            'client_id'=>5
        ]);
    }
}
