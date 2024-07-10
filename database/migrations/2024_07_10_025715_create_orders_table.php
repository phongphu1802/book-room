<?php

use App\Enums\StatusOrderEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('uuid')->autoIncrement();
            $table->unsignedBigInteger('user_uuid');
            $table->foreign('user_uuid')->references('uuid')->on('users');
            $table->unsignedBigInteger('payment_method_uuid');
            $table->foreign('payment_method_uuid')->references('uuid')->on('payment_methods');
            $table->decimal('total_amount');
            $table->enum('status', [StatusOrderEnum::SUCCESS->value, StatusOrderEnum::PENDING->value, StatusOrderEnum::CANCEL->value, StatusOrderEnum::PAID->value]);
            $table->softDeletes();
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