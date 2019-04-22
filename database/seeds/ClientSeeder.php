<?php

use Illuminate\Database\Seeder;
use App\Models\Client;
use App\Models\User;
class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Client::class,1)->create([
            'user_id'=> 3,
        ]);
        factory(Client::class,1)->create([
            'user_id'=> 4,
        ]);
        factory(Client::class,1)->create([
            'user_id'=> 5,
        ]);
        factory(Client::class,1)->create([
            'user_id'=> 6,
        ]);
        factory(Client::class,1)->create([
            'user_id'=> 7,
        ]);
    }
}
