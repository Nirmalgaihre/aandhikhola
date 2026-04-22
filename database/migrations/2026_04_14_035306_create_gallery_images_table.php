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
    Schema::create('gallery_images', function (Blueprint $table) {
        $table->id();
        // This links the image to the gallery. 
        // onDelete('cascade') means if you delete the gallery, the images are deleted too.
        $table->foreignId('gallery_id')->constrained()->onDelete('cascade');
        $table->string('image_path');
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gallery_images');
    }
};
