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
        Schema::create('gudang', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_provinsi');
            $table->foreignId('id_kabupaten');
            $table->string('location', 255);
            $table->integer('status');
            $table->string('nama_perusahaan', 200);
            $table->text('alamat');
            $table->string('phone', 15);
            $table->string('email', 255);
            $table->integer('created_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gudang');
    }
};
