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
           Schema::create('tags', function (Blueprint $table) {
            $table->id();                     // Clave primaria
            $table->string('name');          // ← Esta línea es esencial y ya está incluida
            $table->timestamps();            // created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tags');
    }
};
