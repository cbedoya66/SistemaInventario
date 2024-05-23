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
            $table->string('cod_barra');
            $table->string('nombre');
            $table->string('precio');
            $table->string('descripcion');
            $table->integer('impuesto');
            $table->string('imagen');
            $table->string('categoria');
            $table->string('proveedor');
            $table->string('estado');
            $table->string('placa');
            $table->integer('stock');
            $table->timestamps();
            $table->softDeletes();

            // $table->unsignedBigInteger('pedido_id');
            $table->unsignedBigInteger('categoria_id')->nullable();

            //$table->foreign('pedido_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('categoria_id')->references('id')->on('categorias')->onDelete('set null');
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
