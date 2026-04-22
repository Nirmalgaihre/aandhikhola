<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('contacts', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->string('subject')->nullable();
        $table->text('message');
        
        // --- MISSING COLUMNS START ---
        $table->string('ip_address')->nullable();
        $table->text('device')->nullable();          // This is the one causing the error
        $table->string('location_data')->nullable(); 
        // --- MISSING COLUMNS END ---
        
        $table->timestamps();
    });
}

    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};