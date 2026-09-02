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
        Schema::create('currencies', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->string('name', 100);
            $table->string('code', 10);
            $table->string('symbol', 10)->nullable();
            $table->unsignedTinyInteger('decimal_places')->default(2);
            $table->boolean('is_default')->default(false);
            $table->unsignedTinyInteger('status')->default(1);
            $table->timestamps();
            $table->unique(['user_id', 'code']);
        });


        DB::table('currencies')->insert(
            array([
                'user_id'       => "1",
                'name'          => "الليرة التركية",
                'code'          => 'TRY',
                'symbol'        => '₺',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "الليرة السورية",
                'code'          => 'SYP',
                'symbol'          => 'ل.س',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "لدولار الأمريكي",
                'code'          => 'USD',
                'symbol'          => '$',
                'status'        =>  1,
                'created_at'    => date('Y-m-d H:i:s'),
                'updated_at'    => date('Y-m-d H:i:s'),
            ],[
                'user_id'       => "1",
                'name'          => "اليورو",
                'code'          => 'EUR',
                'symbol'          => '€',
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
        Schema::dropIfExists('currencies');
    }
};
