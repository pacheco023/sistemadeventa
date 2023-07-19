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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('nombre',100);
            $table->char('cantidad', 100);
            $table->decimal('precio', 10,2);

            $table ->bigInteger('categorias_id')->unsigned();
            $table ->bigInteger('proveedores_id')->unsigned();

            $table ->foreign('categorias_id')->references('id')->on('categorias')->onDelete ('cascade');
            $table ->foreign('proveedores_id')->references('id')->on('proveedores')->onDelete ('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
