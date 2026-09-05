<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\{Schema, DB};

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('categories', function (Blueprint $table) {

            $table->id();

            $table->foreignId('user_id')->constrained()->restrictOnDelete();
            $table->string('name', 100);
            $table->enum('type', ['receipt', 'payment']);
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            $table->unique(['user_id', 'name', 'type']);
            $table->softDeletes();
            $table->timestamps();
        });


        DB::table('categories')->insert([
            
            [
                'user_id' => 1,
                'name' => 'الراتب',
                'type' => 'receipt',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'أرباح',
                'type' => 'receipt',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'دخل إضافي',
                'type' => 'receipt',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'رصيد افتتاحي',
                'type' => 'receipt',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'مصروف البيت',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'طعام',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'إيجار بيت',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'فاتورة كهرباء',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'فاتورة ماء',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'فاتورة غاز',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'user_id' => 1,
                'name' => 'مواصلات',
                'type' => 'payment',
                'description' => null,
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};