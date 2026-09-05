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
        Schema::create('currency_transfers', function (Blueprint $table) {
              $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            // العملة التي دفعتها
            $table->foreignId('from_currency_id')->constrained('currencies')->restrictOnDelete();
            $table->decimal('from_amount', 18, 4);
            // العملة التي استلمتها
            $table->foreignId('from_account_id')->constrained('accounts')->restrictOnDelete();
            $table->foreignId('to_currency_id')->constrained('currencies')->restrictOnDelete();
            $table->foreignId('to_account_id')->constrained('accounts')->restrictOnDelete();
            $table->decimal('to_amount', 18, 4);
            // سعر الصرف
            $table->decimal('exchange_rate', 20, 8)->nullable();
            $table->date('transfer_date');
            $table->string('description')->nullable();
            $table->text('note')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('currency_transfers');
    }
};
