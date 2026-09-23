<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->string('mentor_industri')->nullable();
            $table->string('mentor')->nullable();
            $table->text('penjelasan_project')->nullable();
            $table->string('team')->nullable();
            $table->renameColumn('judul', 'nama_project');
        });
    }

    public function down(): void
    {
        Schema::table('reports', function (Blueprint $table) {
            $table->dropColumn(['mentor_industri', 'mentor', 'penjelasan_project', 'team']);
            $table->renameColumn('nama_project', 'judul');
        });
    }
};
