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
        Schema::create('biodata_1198', function (Blueprint $table) {
            $table->id();
            $table->string('nama_lengkap');
            $table->string('nim');
            $table->date('tanggal_lahir');
            $table->string('jenis_kelamin');
            $table->string('email');
            $table->string('no_hp');
            $table->string('foto')->nullable(); // Bonus: Upload Foto
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('biodata_1198s');
    }
};
