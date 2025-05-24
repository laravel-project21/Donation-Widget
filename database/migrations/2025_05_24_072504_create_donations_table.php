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
        Schema::create('donations', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email');
            $table->string('type')->nullable();
            $table->string('account_name')->nullable();
            $table->string('account_id')->nullable();
            $table->decimal('donation')->nullable();
            $table->decimal('pfee')->nullable();
            $table->decimal('tip')->nullable();
            $table->decimal('amount')->nullable();
            $table->tinyInteger(column: 'check')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('donations');
    }
};
