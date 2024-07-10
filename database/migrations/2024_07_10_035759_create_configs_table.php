<?php

use App\Enums\ConfigEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('configs', function (Blueprint $table) {
            $table->unsignedBigInteger('uuid')->autoIncrement();
            $table->string('key');
            $table->text('value');
            $table->enum('type', [ConfigEnum::PUBLIC ->value, ConfigEnum::SYSTEM->value]);
            $table->enum('datatype', [ConfigEnum::BOOLEAN->value, ConfigEnum::TEXT->value, ConfigEnum::IMAGE->value, ConfigEnum::IMAGES->value, ConfigEnum::NUMBER->value]);
            $table->string('description');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('configs');
    }
};