<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGeometriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('geometries', function (Blueprint $table) {
            $table->id();
            $table->decimal('altura', 8, 3)->nullable();
            $table->decimal('espaciamiento', 8, 3)->nullable();
            $table->decimal('gap', 8, 3)->nullable();
            $table->integer('angulo')->nullable();
            $table->unsignedBigInteger('lot_id');
            $table->foreign('lot_id')->references('id')->on('lots');
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
        Schema::dropIfExists('geometries');
    }
}
