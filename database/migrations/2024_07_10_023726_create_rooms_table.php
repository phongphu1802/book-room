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
        Schema::create('rooms', function (Blueprint $table) {
            $table->unsignedBigInteger('uuid')->autoIncrement();
            $table->unsignedBigInteger('type_uuid');
            $table->foreign('type_uuid')->references('uuid')->on('types');
            $table->unsignedBigInteger('hotel_uuid');
            $table->foreign('hotel_uuid')->references('uuid')->on('hotels');
            $table->string('name')->nullable();
            $table->string('image')->nullable();
            $table->text('images')->nullable();
            $table->integer('price')->nullable();
            $table->string('description')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rooms');
    }
};