<?php

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
        $this->truncateTables([
            'roles',
            'products',
            'payments',
            'users',
            'clients',
            'tickets',
            'cash_reports',
            'workshifts',
            'credits',
            'credit_payments',
            'product_ticket',
        ]);
        $this->call([
            RoleSeeder::class,
            ProductSeeder::class,
            PaymentSeeder::class,
            UserSeeder::class,
            ClientSeeder::class,
            TicketSeeder::class,
            CashReportSeeder::class,
            WorkshiftSeeder::class,
            CreditSeeder::class,
            CreditPaymentSeeder::class,
            
        ]);
        // $this->call(ejemplo::class);  // aqui todas las clases de los seeaders por orden al igual que el metodo de truncar
    }
    
    function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // DESACTIVAMOS LAS RELACIONES 
        foreach($tables as $table):
            DB::table($table)->truncate();
        endforeach;
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // LAS ACTIVAMOS DE NUEVO
    }
}
