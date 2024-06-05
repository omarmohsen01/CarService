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
        Schema::create('car_tuning_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description')->nullable();
            $table->double('price');
            $table->json('images')->nullable();
            $table->enum('installation', ['YES','NO'])->default('NO');
            $table->foreignId('car_tuning_id')->constrained('car_tuning')->cascadeOnDelete();
            $table->foreignId('brand_id')->constrained('brands')->cascadeOnDelete();
            $table->foreignId('admin_id')->constrained('admins')->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_tuning_services');
    }
};
