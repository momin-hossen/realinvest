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
        Schema::create('term_termtag', function (Blueprint $table) {
            $table->foreignId('term_id')->constrained('terms')->cascadeOnDelete();
            $table->foreignId('termcategory_id')->constrained('termcategories')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('term_termcategory');
    }
};
