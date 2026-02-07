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
        Schema::create('magang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('perusahaan_id')->constrained('perusahaan')->onDelete('cascade');
            $table->string('judul_magang');
            $table->date('mulai_magang');
            $table->date('selesai_magang');
            $table->enum('status', ['pending', 'approved', 'ongoing', 'finished', 'rejected'])->default('pending');
            $table->timestamps();
        });
    }
};
