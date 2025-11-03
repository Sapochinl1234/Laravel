<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('job_list', function (Blueprint $table) {
            $table->string('company')->nullable();
            $table->string('location')->nullable();
            $table->string('industry')->nullable();
            $table->timestamp('created_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_list', function (Blueprint $table) {
            $table->dropColumn(['company', 'location', 'industry', 'created_at']);
        });
    }
};