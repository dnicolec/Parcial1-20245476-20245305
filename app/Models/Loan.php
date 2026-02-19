<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Loan extends Model
{
    protected $table = 'loan';
    protected $primaryKey = 'loan_id';
    
    protected $fillable = [
        'name_user',
        'book_id',
        'date_loan',
        'hour_loan',
        'date_returned',
    ];
}