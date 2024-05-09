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
        Schema::create('opportunities', function (Blueprint $table) {
            $table->id();
            $table->string('prospect_name');
            $table->string('prospect_email')->unique();
            $table->string('prospect_phone')->nullable();
            $table->string('estimated_budget')->nullable();
            $table->text('opportunity_info')->nullable();
            $table->string('location')->nullable();
            $table->string('title')->nullable();
            $table->timestamp('closing_date')->nullable();
            $table->string('opportunity_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opportunities');
    }
};
