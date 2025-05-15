<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id_User'); // Primary Key
            $table->string('Nama');
            $table->enum('Jenis_Kelamin', ['Laki-laki', 'Perempuan']);
            $table->integer('Usia');
            $table->float('Tinggi_Badan');
            $table->float('Berat_Badan');
            $table->float('IMT')->nullable(); // IMT bisa dihitung otomatis
            $table->date('Date');
            $table->string('Email')->unique();
            $table->string('Password');
            $table->string('Role')->default('User'); // Misal: 'User' atau 'Admin'
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};