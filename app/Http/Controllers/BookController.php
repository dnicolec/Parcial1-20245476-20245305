<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use App\Http\Resources\BookResource;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $query = Book::query();

        if ($request->titulo) {
            $query->where('title', 'like', '%'.$request->titulo.'%');
        }

        if ($request->isbn) {
            $query->where('isbn', $request->isbn);
        }

        if ($request->status) {
            $available = filter_var($request->status, FILTER_VALIDATE_BOOLEAN);
            $query->where('is_available', $available);
        }

        $books = $query->get();

        return response()->json(BookResource::collection($books));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        //
    }
}