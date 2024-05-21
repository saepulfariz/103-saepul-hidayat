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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique();
            // $table->foreign('roles', 'role_id');
            // $table->foreignId('role_id')->index();
            $table->foreignId('role_id')->nullable()->constrained('roles')->onUpdate('SET NULL')->onDelete('CASCADE');

            // $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('npm', 9)->nullable();
            $table->string('image', 128)->default('default.jpg');
            $table->string('telephone', 128)->nullable();
            $table->text('address')->nullable();
            $table->date('birthday')->nullable();
            // $table->integer('coordinator')->nullable()->default(0);
            $table->integer('is_active')->default(1);
            // $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
