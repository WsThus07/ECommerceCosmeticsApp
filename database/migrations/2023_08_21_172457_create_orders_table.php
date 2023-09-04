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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->integer("user_id"); // Customer id
            $table->string("shipping_phoneNumber");
            $table->string("shipping_country");
            $table->string("shipping_city");
            $table->string("shipping_address");
            $table->string("shipping_postalcode");
            $table->integer("product_id");
            $table->integer("quantity");
            $table->integer("total_price");
            $table->string('status')->default("pending");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
