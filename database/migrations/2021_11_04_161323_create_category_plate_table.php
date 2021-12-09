<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoryPlateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('category_plate', function (Blueprint $table) {
            $table->id();
            //  creiamo i vincoli per foreign Key
            $table->foreignId('category_id')->nullable()->onDelete('cascade')->constrained();
            $table->foreignId('plate_id')->nullable()->onDelete('cascade')->constrained();
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
        Schema::dropIfExists('category_plate');
    }
}
