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
            $table->unsignedBigInteger('id')->primary()->autoIncrement();
            $table->unsignedBigInteger('seller_id');
            $table->string('product_name', 50);
            $table->integer('product_price');
            $table->text('product_description');
            $table->string('product_image', 255)->nullable();
            $table->boolean('stock');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('seller_id')->references('id')->on('seller')->onDelete('cascade');
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
