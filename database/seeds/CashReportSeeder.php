<?php

use Illuminate\Database\Seeder;
use App\Models\cashReport;

class CashReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(cashReport::class,4)->create();
    }
}
