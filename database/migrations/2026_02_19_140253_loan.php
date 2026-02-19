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
        Schema::create('loan', function (Blueprint $table) {
            $table->id('loan_id');
            $table->string('name_user')->after('loan_id');
            $table->foreignId('book_id')->constrained('books')->after('name_user');
            $table->date('date_loan')->after('book_id');
            $table->time('hour_loan')->after('date_loan');
            $table->date('date_returned')->nullable()->after('hour_loan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan');
    }
};