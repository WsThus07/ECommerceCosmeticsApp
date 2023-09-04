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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->text('product_short_desc');
            $table->text('product_long_desc');
            $table->decimal('price', 10, 2)->nullable();
            $table->string('product_category_name');
            $table->string('product_subcategory_name');
            $table->integer('product_category_id');
            $table->integer('product_subcategory_id');
            $table->string('product_img');
            $table->integer('quantity')->nullable();
            $table->string('slug');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            // Change back the 'price' column to its previous data type
            $table->float('price')->change();
        });
    }
};
