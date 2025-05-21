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
        Schema::create('topups', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // pengguna yang topup
            $table->decimal('amount', 12, 2); // jumlah uang dalam rupiah
            $table->integer('coins'); // jumlah koin yang didapat
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending'); // status topup
            $table->string('payment_method')->nullable(); // misalnya QRIS, bank transfer, dsb
            $table->string('reference_id')->nullable(); // ID dari Midtrans atau payment gateway
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('topups');
    }
};
