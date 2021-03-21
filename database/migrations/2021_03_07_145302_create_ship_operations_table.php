<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipOperationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ship_operations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ship_id')->onUpdate('cascade')->onDelete('cascade');
            $table->date('date');
            $table->enum('status', ['Beroperasi', 'Tidak Beroperasi']);
            $table->enum('description', ['Aman', 'Cuaca Buruk', 'Perbaikan Mesin', 'Docking', 'Lainnya']);
            $table->string('location');
            $table->longText('note')->nullable();
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
        Schema::dropIfExists('ship_operations');
    }
}
