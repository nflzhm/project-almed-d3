<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('artikels', function (Blueprint $table) {
            $table->id();

            $table->string('judul');

            $table->text('deskripsi')->nullable();

            $table->longText('isi')->nullable();

            $table->string('gambar')->nullable();

            $table->string('kategori')->nullable();

            // STATUS ARTIKEL
            $table->enum('status', ['draft', 'published'])
                  ->default('draft');

            // JUMLAH VIEW
            $table->integer('views')->default(0);

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('artikels');
    }
};