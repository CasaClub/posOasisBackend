<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTicketDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket_details', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->unsignedInteger('commodity_id');
            $table->foreign('commodity_id')->references('id')->on('commodities');
            $table->unsignedInteger('quantity');
            $table->decimal('amount',8,2); // of products
            $table->decimal('discount',8,2);
            $table->decimal('total_taxes',8,2);
            $table->decimal('Subtotal',8,2);
            $table->decimal('total',8,2);
        
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ticket_details');
    }
}
