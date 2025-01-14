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
        Schema::create('dynamic_columns', function (Blueprint $table) {
            $table->id();
            $table->string('column_name'); // Name of the dynamic column
            $table->enum('column_type', ['text', 'file', 'number', 'date', 'boolean']) // Restrict to specific types
                  ->default('text'); // Default type
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('columns');
    }
};
