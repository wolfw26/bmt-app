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
        Schema::create('doc_peserta', function (Blueprint $table) {
            $table->id();
            $table->string('doc_name');
            $table->string('deskripsi')->nullable();
            $table->foreignId('peserta_id')->constrained('peserta')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doc_peserta');
    }
};
