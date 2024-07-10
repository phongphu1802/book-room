<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('cart_items', function (Blueprint $table) {
            $table->unsignedBigInteger('uuid')->autoIncrement();
            $table->unsignedBigInteger('room_uuid');
            $table->foreign('room_uuid')->references('uuid')->on('rooms');
            $table->unsignedBigInteger('cart_uuid');
            $table->foreign('cart_uuid')->references('uuid')->on('carts');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('sub_total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cart_items');
    }
};