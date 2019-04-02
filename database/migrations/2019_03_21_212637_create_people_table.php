<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',30);
            $table->string('surnames',50);
            $table->string('dni',30);
            $table->string('telephone',30);
            $table->string('direction',100)->nullable();
            $table->timestamps();
        });
    }
<<<<<<< HEAD

=======
    
>>>>>>> 2be0a8ea9313bb4c348d1398420c00ef36ae7315
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('people');
    }
}
