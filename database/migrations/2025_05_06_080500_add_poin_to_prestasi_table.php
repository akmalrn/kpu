<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->string('poin')->nullable();  // Bisa sesuaikan tipe datanya, misal integer jika poin berupa angka
        });
    }

    public function down()
    {
        Schema::table('prestasi', function (Blueprint $table) {
            $table->dropColumn('poin');
        });
    }

};
