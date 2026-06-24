@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
    <div class="container">
        <h1>Dashboard</h1>
        <hr>
        <h2>Latest Users</h2>

        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <ul>
                @foreach($users as $user)
                    <li>
                        {{ $user->name }} -
                        {{ $user->email }}
                    </li>
                @endforeach
            </ul>
        @endif

        <hr>

        <h2>Latest Books</h2>

        @if($books->isEmpty())
            <p>No books found.</p>
        @else
            <ul>
                @foreach($books as $book)
                    <li>
                        {{ $book->title }}
                    </li>
                @endforeach
            </ul>
        @endif

        <h3>Registered Users</h3>
        @include('users')
        @if($users->isEmpty())
            <p>No users found.</p>
        @else
            <ul>
                @foreach($users as $user)
                    <li>
                        {{ $user->name }}
                    </li>
                @endforeach
            </ul>
        @endif
       


    </div>
@endsection