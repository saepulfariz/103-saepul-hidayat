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
        Schema::create('organizations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('shortname');
            $table->string('logo');
            $table->string('year');
            $table->text('visi')->nullable();
            $table->text('misi')->nullable();
            $table->text('qoute')->nullable();
            $table->string('email');
            $table->string('telephone')->nullable();
            $table->string('instagram')->nullable();
            $table->string('website')->nullable();
            $table->string('youtube')->nullable();
            $table->text('address')->nullable();
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('organizations');
    }
};
