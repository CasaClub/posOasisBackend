<?php

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class,1)->create([
            'name'=>"Logan",
            'surnames'=>'Ramirez',
            'dni'=>'117260018',
            'telephone'=>'89966245',
            'direction'=>'La granja',
            'role_id' => 1,
            'password' =>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        ]);
        
        factory(User::class,1)->create([
            'name'=>"Ismael",
            'surnames'=>'Reyes',
            'dni'=>'155820481208',
            'telephone'=>'84700819',
            'direction'=>'Nosara',
            'role_id' => 1,
            'password' =>'$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret

        ]);
        
        factory(User::class,10)->create(); 
    }
}
