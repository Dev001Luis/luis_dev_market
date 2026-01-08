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
        Schema::create('skills', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // e.g., "Laravel"
            $table->string('slug')->unique(); // for SEO friendly URLs
            $table->text('description');
            $table->unsignedTinyInteger('stars')->default(0); // 0 to 6
            $table->decimal('price', 8, 2); // Every skill has a "value"
            $table->string('category'); // e.g., "Backend", "Frontend"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('skills');
    }
};
