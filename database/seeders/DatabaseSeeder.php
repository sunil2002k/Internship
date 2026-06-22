<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Book;
use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create a pool of 10 generic student/borrower users
        $users = User::factory(10)->create();

        // 2. Create a pool of 20 books
        $books = Book::factory(20)->create();

        // 3. Create 2 admin users
        $admins = Admin::factory(2)->create();
    }
}
