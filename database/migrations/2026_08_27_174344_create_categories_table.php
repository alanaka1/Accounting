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
            $table->enum('type', ['receipt', 'expense']); // receipt = مقبوضات + // expense = مصروفات
            $table->text('description')->nullable();
            $table->unsignedTinyInteger('status')->default(1);
            
            $table->unique(['user_id', 'name', 'type']);
            $table->timestamps();
            $table->softDeletes();
        });


        DB::table('categories')->insert(
            array([
                'user_id'       => "1",
                'name'          => "الراتب",
                'type'          => 'receipt',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "أرباح",
                'type'          => 'receipt',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "دخل إضافي",
                'type'          => 'receipt',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "رصيد افتتاحي",
                'type'          => 'receipt',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "مصروف البيت",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "طعام",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "رصيد افتتاحي",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "إيجار بيت",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "فاتورة كهرباء",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "فاتورة ماء",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "فاتورة غاز",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "مواصلات",
                'type'          => 'expense',
                'description'   => '',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ]),
        );
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};
