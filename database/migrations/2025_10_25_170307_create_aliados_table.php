<?php

// Importa las clases necesarias para definir una migración
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

// Retorna una clase anónima que extiende Migration
return new class extends Migration {

    // Método que se ejecuta al aplicar la migración (php artisan migrate)
    public function up(): void
    {
        // Crea la tabla 'aliados' en la base de datos
        Schema::create('aliados', function (Blueprint $table) {

            $table->id(); // Crea una columna 'id' autoincremental como clave primaria

            $table->string('nombre'); 
            $table->enum('tipo', ['educativo', 'corporativo', 'bienestar']); 
            $table->text('descripcion'); 
            $table->string('imagen')->nullable(); 
            // Crea una columna para guardar el nombre o ruta de la imagen. Puede ser nula.
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null'); 
            // Crea una relación con la tabla 'users' (campo 'id') Si el usuario se elimina, el campo se pone en null (no se borra el aliado)
            $table->timestamps(); 
            // Crea automáticamente las columnas 'created_at' y 'updated_at'
        });
    }

    // Método que se ejecuta al revertir la migración (php artisan migrate:rollback)
    public function down(): void
    {
        Schema::dropIfExists('aliados'); 
        // Elimina la tabla 'aliados' si existe
    }
};
?>