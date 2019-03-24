<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;

class CreateCommoditiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('commodities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('internal_code',50);
            $table->foreign('internal_code')->references('internal_code')->on('products');
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
        Schema::dropIfExists('commodities');
    }
}
