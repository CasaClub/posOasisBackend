<?php

use Illuminate\Database\Seeder;
use App\Models\Workshift;

class WorkshiftSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Workshift::class,5)->create();
    }
}
