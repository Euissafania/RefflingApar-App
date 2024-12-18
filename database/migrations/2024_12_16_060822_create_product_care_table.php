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
        Schema::create('product_care', function (Blueprint $table) {
            $table->id(); 
            $table->foreignId('gudang_id');
            $table->string('customer_name', 100);
            $table->string('phone_number', 13);
            $table->decimal('latitude_pickup', 9, 6);
            $table->decimal('longitude_pickup', 9, 6);
            $table->dateTime('product_care_date');
            $table->integer('total');
            $table->integer('payment_method');
            $table->integer('payment_status');
            $table->integer('product_care_type');
            $table->integer('product_care_status');
            $table->Integer('created_by')->nullable();
            $table->dateTime('pickup_at')->nullable();
            $table->Integer('pickup_by')->nullable();
            $table->dateTime('delivered_at')->nullable();
            $table->Integer('delivered_by')->nullable();
            $table->Integer('updated_by')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_care');
    }
};
