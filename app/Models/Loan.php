<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';
    protected $primaryKey = 'loan_id';
    protected $fillable = [
        'name_user',
        'date_loan',
        'hora_loan',
        'book_reference',
        'date_returned'
    ];
}