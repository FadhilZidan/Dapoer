<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->string('subtitle')->nullable();
            $table->text('description');
            $table->text('heritage_narrative')->nullable();
            $table->integer('price');
            $table->integer('original_price')->nullable();
            $table->string('category'); // main, rice, sweet, condiment
            $table->string('region')->nullable();
            $table->string('heat_level')->nullable();
            $table->string('cook_time')->nullable();
            $table->json('key_ingredients')->nullable();
            $table->string('image')->nullable();
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
