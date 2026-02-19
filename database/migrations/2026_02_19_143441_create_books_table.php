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
        Schema::create('books', function (Blueprint $table) {
            $table->integer('description')->after('title');
            $table->integer('isbn')->unique()->after('title');
            $table->integer('total_copies')->after('descrpition');
            $table->string('aviable_copies')->after('total_copies');
            $table->boolean('is_avaible')->after('aviable_copies');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
