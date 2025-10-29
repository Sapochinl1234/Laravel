<?php

// database/migrations/xxxx_xx_xx_add_company_id_to_job_list.php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('job_list', function (Blueprint $table) {
            $table->foreignId('company_id')
                  ->nullable()
                  ->constrained('companies')
                  ->cascadeOnDelete();
        });
    }

    public function down(): void {
        Schema::table('job_list', function (Blueprint $table) {
            $table->dropForeign(['company_id']);
            $table->dropColumn('company_id');
        });
    }
};