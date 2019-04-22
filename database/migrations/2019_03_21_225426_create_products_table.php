<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use App\Models\Product;

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
            $table->string('internal_code',50)->unique();
            $table->string('name',50);
            $table->decimal('price_cost', 12, 2)->nullable()->default(0);
            $table->decimal('price_sale', 12, 2)->nullable()->default(0);
            $table->unsignedInteger('stock')->default(0);
            $table->decimal('wholesalers_price',12,2)->nullable()->default(0); // precio mayorista
            $table->decimal('taxes',12,2)->nullable()->default(0); // impuestos
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->default(Product::active);
            $table->timestamps();
            $table->softDeletes(); // para el borrado logico
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
