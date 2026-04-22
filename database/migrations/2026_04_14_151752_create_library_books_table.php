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
        Schema::create('library_books', function (Blueprint $table) {
    $table->id();
    $table->string('book_name');
    $table->enum('department', ['DCE', 'DIT']);
    $table->integer('semester'); // 1 to 6
    $table->integer('total_qty');
    $table->integer('available_qty');
    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('library_books');
    }
};
