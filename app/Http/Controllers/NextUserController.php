<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NextUserController extends Controller
{
    // 1. READ (List all users)
    public function index()
    {
        $users = User::all();
        return response()->json($users);
    }

    // 2. CREATE (Store a new user)
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|unique:users,email',
            'password' => 'required|string|min:8',
            'age' => 'required|integer|min:1',
            'referrer_id' => 'nullable|exists:users,id', 
        ]);

        $user = User::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'age' => $validated['age'],
            'referrer_id' => $validated['referrer_id'],
        ]);

        return response()->json(['message' => 'User created successfully', 'user' => $user], 201);
    }

    // 3. READ (Show a specific user)
    public function show(User $user)
    {
        $user = User::find($user);
        return $user;
    }

    // 4. UPDATE (Modify an existing user)
    public function update(Request $request, User $user)
    {
        $validated = $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => 'sometimes|string|email|unique:users,email,' . $user->id,
            'age' => 'sometimes|integer|min:1',
            'referrer_id' => 'sometimes|exists:users,id',
        ]);

        $user->update($validated);

        return response()->json(['message' => 'User updated successfully', 'user' => $user]);
    }

    // 5. DELETE (Remove a user)
    public function destroy(User $user)
    {
        // Note: Due to onDelete('cascade'), deleting this user will automatically 
        // delete any other users who have this user's ID as their referrer_id!
        $user->delete();

        return response()->json(['message' => 'User deleted successfully']);
    }
}
