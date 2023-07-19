<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('factura', function (Blueprint $table) {
            $table->id();
            $table->decimal('subtotal' ,10,2);
            $table->decimal('total', 10,2);

            $table ->bigInteger('cliente_id')->unsigned();
            $table ->bigInteger('empleado_id')->unsigned();

            $table ->foreign('cliente_id')->references('id')->on('cliente')->onDelete ('cascade');
            $table ->foreign('empleado_id')->references('id')->on('empleado')->onDelete ('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factura');
    }
};
