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
        Schema::create('projects_plans', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->string('gallery_image');
            $table->string('thumbnail_image');
            $table->string('preview_image');
            $table->integer('invest_type');
            $table->integer('capital_back');
            $table->integer('min_invest');
            $table->integer('max_invest');
            $table->integer('max_invest_amount');
            $table->integer('is_period');
            $table->string('profit_range');
            $table->string('loss_range');
            $table->string('location');
            $table->string('address');
            $table->longText('description');
            $table->timestamps();
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects_plans');
    }
};
