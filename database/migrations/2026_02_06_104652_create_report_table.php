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
        Schema::create('report', function (Blueprint $table) {
            $table->id();
            $table->foreignId('magang_id')->constrained('magang')->onDelete('cascade');
            $table->date('tanggal_magang');
            $table->text('kegiatan_magang');
            $table->enum('status', ['pending', 'approved', 'revised'])->default('pending');
            $table->timestamps();
        });
    }
};
