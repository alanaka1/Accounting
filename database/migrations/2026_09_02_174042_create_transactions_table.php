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
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->foreignId('currency_id')->constrained('currencies')->restrictOnDelete();
            $table->foreignId('category_id')->nullable()->constrained('categories')->nullOnDelete();
            $table->enum('type', ['receipt', 'payment']);
            $table->decimal('amount', 18, 4);
            $table->string('description')->nullable();
            $table->date('transaction_date');
            $table->text('note')->nullable();
            /*
             * إذا الحركة ناتجة عن تحويل عملة
             * يتم ربطها بعملية التحويل.
             *
             * الحركات العادية تكون NULL.
             */
            $table->foreignId('transfer_id')->nullable()->constrained('currency_transfers')->cascadeOnDelete();
            $table->timestamps();
            $table->index(['user_id', 'currency_id', 'type', 'transaction_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transactions');
    }
};
