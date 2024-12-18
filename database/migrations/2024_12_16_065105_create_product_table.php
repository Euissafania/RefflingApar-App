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
        Schema::create('product', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_category');
            $table->integer('createSN');
            $table->string('name', 255);
            $table->string('PNO', 45);
            $table->integer('price_lama');
            $table->double('price', 19, 2);
            $table->integer('stock');
            $table->text('description');
            $table->integer('minQty');
            $table->float('weight');
            $table->integer('expired');
            $table->integer('warranty');
            $table->integer('expiredSNI');
            $table->integer('warrantySNI');
            $table->integer('created_by')->nullable();
            $table->integer('Status');
            $table->float('panjang');
            $table->float('lebar');
            $table->float('tinggi');
            $table->text('fire_rating')->nullable();
            $table->text('media')->nullable();
            $table->text('type')->nullable();
            $table->text('kapasitas')->nullable();
            $table->text('kelas_kebakaran')->nullable();
            $table->text('tabung_silinder')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
