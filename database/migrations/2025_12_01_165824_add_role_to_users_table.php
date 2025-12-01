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
        Schema::table('users', function (Blueprint $table) {
            // Menambahkan kolom role dengan default 'karyawan'
            // after('email') artinya kolom ini ditaruh setelah kolom email biar rapi
            $table->enum('role', ['admin', 'karyawan'])->default('karyawan')->after('email');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Ini untuk menghapus kolom kalau nanti kita mau rollback (batalin migrasi)
            $table->dropColumn('role');
        });
    }
};