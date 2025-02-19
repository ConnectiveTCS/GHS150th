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
        //
        Schema::create('project_cards', function (Blueprint $table) {
            $table->id();
            // Removed foreign constraint for project_id since the projects table does not exist.
            $table->unsignedBigInteger('project_id')->nullable();
            $table->longText('image')->nullable();
            $table->string('title');
            $table->text('description')->nullable();
            $table->integer('position')->default(0)->nullable();
            $table->text('status', ['Current', 'Upcoming', 'Completed'])->default('Current');
            $table->text('completion_percentage')->nullable();
            $table->text('project_timeline')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
        Schema::dropIfExists('project_cards');
    }
};
