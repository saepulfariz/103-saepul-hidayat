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
        Schema::create('transaction_history', function (Blueprint $table) {
            $table->id();
            $table->foreignId('transaction_id')->nullable()->constrained('transactions')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->foreignId('user_id')->nullable()->constrained('users')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->float('balance');
            $table->float('debit');
            $table->float('credit');
            $table->timestamp('datetime');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaction_history');
    }
};
