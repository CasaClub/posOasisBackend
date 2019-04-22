<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;
class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Role::class,1)->create(['name'=>'admin']);
        factory(Role::class,1)->create(['name'=>'cashier']);
        factory(Role::class,1)->create(['name'=>'client']);
    }
}
