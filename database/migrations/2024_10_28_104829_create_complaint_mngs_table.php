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
        Schema::create('complaint_mngs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('full_name');
            $table->string('complainant');
            $table->string('complainee');
            $table->text('description');
            $table->string('img');
            $table->string('submit_date_com')->default('...');
            $table->string('submit_clock_com')->default('...');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('complaint_mngs');
    }
};
