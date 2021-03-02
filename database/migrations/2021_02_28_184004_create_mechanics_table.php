<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMechanicsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mechanics', function (Blueprint $table) {
            $table->id();
            $table->decimal('fy', 8, 3)->nullable();
            $table->decimal('fx', 8, 3)->nullable();
            $table->decimal('a', 8, 3)->nullable();
            $table->decimal('re', 8, 3)->nullable();
            $table->string('d')->nullable();
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
        Schema::dropIfExists('mechanics');
    }
}
