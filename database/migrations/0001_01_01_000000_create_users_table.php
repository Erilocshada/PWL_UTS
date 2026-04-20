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
        // Sesuaikan nama tabel menjadi m_user sesuai gambar
        Schema::create('m_user', function (Blueprint $table) {
            $table->id('user_id'); // Primary Key (PK) sesuai gambar
            // Foreign Key ke m_level
            $table->unsignedBigInteger('level_id')->index(); 
            $table->string('username', 20)->unique(); // string(20) sesuai gambar
            $table->string('nama', 100); // string(100) sesuai gambar
            $table->string('password', 255); // string(255) sesuai gambar
            
            // Tambahan wajib Laravel agar Filament/Auth tidak error
            $table->rememberToken();
            $table->timestamps();

            // Definisi Foreign Key
            $table->foreign('level_id')->references('level_id')->on('m_level')->onDelete('cascade');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            // Sesuaikan foreignId ke user_id di m_user
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('m_user');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};