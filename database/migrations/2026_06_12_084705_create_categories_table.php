<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // Kolom 'nama' sudah ada di create_categories_table
        // Tidak perlu ditambahkan lagi
    }

    public function down(): void
    {
        // Tidak ada yang perlu di-rollback
    }
};