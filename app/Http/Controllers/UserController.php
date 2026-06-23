<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $incomingFields = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:3', 'max:10']
        ]);

        $incomingFields['password'] = bcrypt($incomingFields['password']);
        $user = User::create($incomingFields);

        return response()->json([
            'message' => 'User created successfully.',
            'user' => $user,
        ], 201);
    }

    public function users()
    {
        $users = User::withTrashed()->get();
        return view('users', compact('users'));
    }
    
    public function usersById($id)
    {
        $user = User::withTrashed()->find($id);
        if (! $user) {
            return redirect('/users')->with('error', 'User not found.');
        }

        return view('usersById', compact('user'));
    }
    public function edit($id)
{
    $user = User::withTrashed()->find($id);

    if (!$user) {
        return redirect('/users')
            ->with('error', 'User not found.');
    }

    return view('editUser', compact('user'));
}

    public function updateById(Request $request, $id)
    {
        $user = User::withTrashed()->find($id);
        if (!$user) {
            return redirect('/users')->with('error', 'User not found.');
        }

        $validated = $request->validate([
            'name' => ['required', 'min:3', 'max:10'],
            'email' => ['required', 'email'],
        ]);
        $user->update($validated);

        return "User updated successfully.";
    }

    public function deleteById($id)
    {
        $user = User::withTrashed()->find($id);
        if (! $user) {
            return redirect('/users')->with('error', 'User not found.');
        }

        $user->delete();
        return 'User deleted successfully.';
    }
    public function optionalParam($name='Guest'){
        return 'Hello,'.$name;
    }
}
