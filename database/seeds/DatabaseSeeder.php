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
<<<<<<< HEAD
        $this->truncateTables([]);

        // $this->call(ejemplo::class);  // aqui todas las clases de los seeaders por orden al igual que el metodo de truncar
    }

=======
        $this->truncateTables([
            'roles',
            'products',
            'payments',
            'people',
            'users',
            'cash_reports',
            'workshifts',
            'clients',
            'credits',
            'credit_payments',
            'ticket_details',
        ]);
        $this->call([
            RoleSeeder::class,
            ProductSeeder::class,
            PaymentSeeder::class,
            PersonSeeder::class,
            UserSeeder::class,
            TicketSeeder::class,
            CashReportSeeder::class,
            WorkshiftSeeder::class,
            ClientSeeder::class,
            CreditSeeder::class,
            CreditPaymentSeeder::class,
            TicketDetailsSeeder::class,
            
        ]);
        // $this->call(ejemplo::class);  // aqui todas las clases de los seeaders por orden al igual que el metodo de truncar
    }
    
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
    function truncateTables(array $tables){
        DB::statement('SET FOREIGN_KEY_CHECKS = 0;'); // DESACTIVAMOS LAS RELACIONES 
        foreach($tables as $table):
            DB::table($table)->truncate();
        endforeach;
        DB::statement('SET FOREIGN_KEY_CHECKS = 1;'); // LAS ACTIVAMOS DE NUEVO
    }
}
