<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->text('photos')->nullable(); // Store as JSON array
            // Make existing fields nullable if they aren't already
            $table->string('nama')->nullable()->change();
            $table->string('nim')->nullable()->change();
            $table->string('nama_project')->nullable()->change();
            $table->string('file_laporan')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn('photos');
        });
    }
};
