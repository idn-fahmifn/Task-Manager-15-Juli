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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('desc')->nullable();
            // status todo, done, in progress
            $table->enum('status', ['todo', 'in_progress', 'done'])->default('todo');
            // priority
            $table->enum('priority', ['low', 'medium', 'high'])->default('medium');
            $table->unsignedTinyInteger('progress')->default(0);

            // posisi card
            $table->unsignedInteger('position')->default(0);

            // foreign untuk assignment
            $table->foreignId('assign_to')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();
            $table->foreignId('created_by')->nullable()->constrained('users')->cascadeOnUpdate()->nullOnDelete();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
