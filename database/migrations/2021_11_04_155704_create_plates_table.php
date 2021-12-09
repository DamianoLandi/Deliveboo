<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plates', function (Blueprint $table) {
            $table->id();
            // inseriamo le proprietà della tabella
            $table->string('name', 100);
            $table->string('image')->nullable();
            $table->text('description')->nullable();
            $table->float('price', 5, 2);
            $table->boolean('is_available');
            $table->char('serving', 3);
            //  creiamo i vincoli per foreign Key
            $table->foreignId('restaurant_id')->nullable()->onDelete('cascade')->constrained();
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
        Schema::dropIfExists('plates');
    }
}
