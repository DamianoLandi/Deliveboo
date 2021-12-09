<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRestaurantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('restaurants', function (Blueprint $table) {
            $table->id();
            // inseriamo le proprietà della tabella restaurants
            $table->string('name', 100);
            $table->string('address')->unique();
            $table->char('vat_number', 11)->unique();
            $table->string('phone', 30)->nullable();
            $table->string('hours')->nullable();
            
            //  creiamo i vincoli per foreign Key
            $table->foreignId('user_id')->nullable()->onDelete('set null')->constrained();
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
        Schema::dropIfExists('restaurants');
    }
}
