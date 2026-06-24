<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\User;

class DashboardController extends Controller
{
    public function dashboard()
{
    $users = User::latest()->take(5)->get();

    $books = Book::latest()->take(10)->get();

    return view(
        'dashboard',
        compact(
            'users',
            'books',
            
        )
    );
}
}
