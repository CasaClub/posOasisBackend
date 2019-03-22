<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Models\Product;
class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',50);
            $table->decimal('price_cost', 8, 2);
            $table->decimal('price_sale', 8, 2);
            $table->unsignedInteger('stock')->default(0);
            $table->decimal('wholesalers_price',8,2); // precio mayorista
            $table->decimal('taxes',8,2); // impuestos
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->default(Product::active);
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
        Schema::dropIfExists('products');
    }
}
