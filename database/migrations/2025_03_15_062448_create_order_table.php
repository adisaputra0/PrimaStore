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
        Schema::create('order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('order_id', 50)->unique();
            $table->string('transaction_id', 100);
            $table->decimal('gross_amount', 10, 2);
            $table->string('payment_type', 50);
            $table->string('transaction_status', 50);
            $table->string('fraud_status', 50)->nullable();
            $table->string('payment_code', 100)->nullable();
            $table->string('va_number', 100)->nullable();
            $table->string('bank', 50)->nullable();
            $table->text('pdf_url')->nullable();
            $table->dateTime('transaction_time');
            $table->string('name'); // Tambahin nama customer
            $table->string('email'); // Tambahin email customer
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order');
    }
};
