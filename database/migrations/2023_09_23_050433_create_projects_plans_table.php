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
            $table->string('thumbnail');
            $table->text('preview');
            $table->integer('invest_type');
            $table->integer('capital_back');
            $table->integer('min_invest');
            $table->integer('max_invest');
            $table->integer('max_invest_amount');
            $table->integer('is_period');
            $table->integer('period_duration');
            $table->string('profit_range');
            $table->string('loss_range');
            $table->integer('status');
            $table->integer('accept_new_investor');
            $table->integer('accept_installments');
            $table->string('address');
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
