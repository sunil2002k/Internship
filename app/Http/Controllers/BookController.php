<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // read all data
        return Book::all();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|min:3',
            'author' => 'required|min:3',
            'description' => 'nullable',
            'price' => 'required|numeric',
            'stock' => 'required|integer',
            'user_id' => 'required|exists:users,id',
        ]);

        $book = Book::create($data);

        return response()->json([
            'message' => 'Book created successfully',
            'book' => $book
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book)
    {
        //
        return $book;
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Book $book)
    {
        $data = $request->validate([
            'title' => 'sometimes|min:3',
            'author' => 'sometimes|min:3',
            'description' => 'nullable',
            'price' => 'sometimes|numeric',
            'stock' => 'sometimes|integer',
            'user_id' => 'sometimes|exists:users,id',
        ]);

        $book->update($data);

        return response()->json([
            'message' => 'Book updated successfully',
            'book' => $book
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book)
    {
        $book->delete();
        return response()->json([
            'message' => 'Book updated successfully'
        ]);
    }
}
