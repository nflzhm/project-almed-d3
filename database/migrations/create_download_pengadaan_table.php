<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('download_pengadaan', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->string('kategori');
            $table->string('periode');
            $table->text('deskripsi');
            $table->string('file')->nullable();
            $table->bigInteger('ukuran')->nullable();
            $table->integer('download_count')->default(0);
            $table->date('tanggal_upload')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('download_pengadaan');
    }
};