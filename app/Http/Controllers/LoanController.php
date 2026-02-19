<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreLoanRequest;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreLoanRequest $request)
    {
        $validatedData = $request->validated();

        if (empty($validatedData['date_loan'])) {
        $validatedData['date_loan'] = now()->toDateString();
        }

        if (empty($validatedData['hour_loan'])) {
            $validatedData['hour_loan'] = now()->toTimeString();
        }

        $book = Book::where('id', $validatedData['book_id'])->first();

        if (!$book || $book->available_copies <= 0) {
            return response()->json(['error' => 'No hay existencias disponibles'], 422);
        }

        Loan::create([
            'name_user' => $validatedData['name_user'],
            'book_id' => $book->id,
            'date_loan' => $validatedData['date_loan'],
            'hour_loan' => $validatedData['hour_loan'],
        ]);

        $book->decrement('available_copies');

        if ($book->available_copies <= 0) {
            $book->is_available = false;
            $book->save();
        }

        return response()->json(['message' => 'Préstamo registrado exitosamente'], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Book return.
     */
    public function returnBook(string $loan_id)
    {
        $loan = Loan::where('loan_id', $loan_id)->first();

        if (!$loan || $loan->date_returned !== null) {
            return response()->json(['error' => 'No se puede devolver este préstamo'], 422);
        }

        $loan->date_returned = now();
        $loan->save();

        $book = Book::where('id', $loan->book_id)->first();
        $book->available_copies++;
        $book->is_available = true;
        $book->save();

        return response()->json(['message' => 'Devolución registrada'], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}