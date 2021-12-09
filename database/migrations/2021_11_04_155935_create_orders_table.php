<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            // inseriamo le proprietà della tabella
            $table->float('amount', 6, 2);
            $table->boolean('is_payed');
            $table->string('customer_name', 100);
            $table->string('customer_lastname', 100);
            $table->string('customer_address');
            $table->string('customer_email')->unique();
            // ___________________________________
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
        Schema::dropIfExists('orders');
    }
}
