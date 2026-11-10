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
            $table->id('codigo');
            $table->string('descripcion',100);
            $table->string('unidad_medida',20);
            $table->decimal('precio',12,2);
            $table->unsignedBigInteger('categoria_codigo');
            $table->timestamps();

            $table->foreign('categoria_codigo')
            ->references('codigo')
            ->on ('categoria')
            ->onDelete('cascade');
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
