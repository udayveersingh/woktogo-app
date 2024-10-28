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
        Schema::table('deals', function (Blueprint $table) {
            //
            $table->string('image')->nullable(); // Store image path or URL
            
            // Add deadline column
            $table->date('deadline')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('deals', function (Blueprint $table) {
            //
            $table->dropColumn('image');
            
            // Remove the deadline column
            $table->dropColumn('deadline');
        });
    }
};
