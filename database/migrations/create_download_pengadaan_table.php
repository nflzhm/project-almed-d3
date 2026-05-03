<?php

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
