<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
{
    Schema::table('artikels', function (Blueprint $table) {
        $table->unsignedBigInteger('dokter_id')->nullable()->after('kategori');
        $table->foreign('dokter_id')->references('id')->on('dokters')->nullOnDelete();
    });
}

public function down()
{
    Schema::table('artikels', function (Blueprint $table) {
        $table->dropForeign(['dokter_id']);
        $table->dropColumn('dokter_id');
    });
}
};