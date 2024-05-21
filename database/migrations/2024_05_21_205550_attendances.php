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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->nullable()->constrained('members')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->foreignId('meet_id')->nullable()->constrained('meetings')->onUpdate('SET NULL')->onDelete('CASCADE');
            $table->enum('presensi', ['hadir', 'ijin', 'sakit', 'alfa']);
            $table->timestamp('datetime');
            $table->text('note')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
