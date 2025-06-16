<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('about_sections', function (Blueprint $table) {
        $table->id();
        $table->string('title')->nullable();       // E.g. "Lemon & Ginger", "Our Mission"
        $table->text('description')->nullable();  // Description text
        $table->string('image_path')->nullable();  // Path for image
        $table->integer('order')->default(0);      // For ordering sections
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_sections');
    }
};
