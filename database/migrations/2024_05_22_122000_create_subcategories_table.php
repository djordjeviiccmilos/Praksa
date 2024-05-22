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
        Schema::create('subcategories', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->string('names',255);
            $table->text('subcategory_descriptions');
            $table->foreignId('category_id')->constrained();
            $table->foreignId('created_by')->constrained('users', 'id')->noActionOnDelete()->cascadeOnUpdate();
            $table->foreignId('updated_by')->constrained('users', 'id')->noActionOnDelete()->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subcategories');
    }
};
