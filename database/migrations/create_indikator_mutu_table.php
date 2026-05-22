<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('indikator_mutu', function (Blueprint $table) {
            $table->id();

            $table->unsignedTinyInteger('bulan');
            $table->unsignedSmallInteger('tahun');

            foreach (['kbt','apd','idp','sc','wtj','poe','kvd','pkl','kfn','kcp','prj','ktk'] as $key) {
                $table->decimal("{$key}_capaian", 6, 2)->nullable();
                $table->unsignedInteger("{$key}_numerator")->nullable();
                $table->unsignedInteger("{$key}_denominator")->nullable();
                $table->text("{$key}_analisa")->nullable();
                $table->text("{$key}_rtl")->nullable();
            }

            $table->decimal('kep_capaian', 6, 2)->nullable();
            $table->text('kep_analisa')->nullable();
            $table->text('kep_rtl')->nullable();

            $table->timestamps();

            $table->unique(['bulan', 'tahun']);
            $table->index(['tahun', 'bulan']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('indikator_mutu');
    }
};