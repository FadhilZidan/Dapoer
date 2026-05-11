<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->string('reference')->unique();
            $table->string('full_name');
            $table->string('street_address');
            $table->string('city');
            $table->string('postal_code');
            $table->string('payment_method'); // card, bank_transfer, ewallet
            $table->integer('subtotal');
            $table->integer('tax');
            $table->integer('shipping');
            $table->integer('total');
            $table->string('status')->default('processing'); // processing, shipped, delivered
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
