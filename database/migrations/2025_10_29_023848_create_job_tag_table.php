<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Ejecutar la migración.
     */
    public function up(): void
    {
        Schema::create('job_tag', function (Blueprint $table) {
            $table->id();

            // Relación con la tabla de empleos personalizada: job_list
            $table->foreignId('job_id')
                  ->constrained('job_list')
                  ->cascadeOnDelete();

            // Relación con la tabla de etiquetas: tags
            $table->foreignId('tag_id')
                  ->constrained('tags')
                  ->cascadeOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Revertir la migración.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_tag');
    }
};