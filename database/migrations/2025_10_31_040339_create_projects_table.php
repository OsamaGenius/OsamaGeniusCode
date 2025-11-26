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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('title', 150);
            $table->mediumText('description');
            $table->string('project_url')->nullable();
            $table->string('repo_url')->nullable();
            $table->string('category')->default('Template');
            $table->string('payment')->default('Free');
            $table->double('price')->default(0.00);
            $table->json('tech_stack')->nullable();
            $table->string('image')->nullable()->default('imgs/skill.png');
            $table->string('vedio')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
