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
        Schema::create('comments', function (Blueprint $table) {
            $table->id()->autoIncrement();
            $table->mediumText('comments');
            $table->dateTime('comment_dates')->default(now());
            $table->foreignId('post_id')->constrained();
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
        Schema::dropIfExists('comments');
    }
};
