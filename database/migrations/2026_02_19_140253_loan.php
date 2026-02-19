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
            // name_user, date_loan, hora_loan, book_reference, date_returned
            $table->id('loan_id');
            $table->string('name_user')->after('loan_id');
            $table->date('date_loan')->after('name_user');
            $table->time('hora_loan')->after('date_loan');
            $table->string('book_reference')->after('hora_loan');
            $table->date('date_returned')->nullable()->after('book_reference');
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
