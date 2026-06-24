@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div style="border: 3px solid black;">
    <h2>Register</h2>
    <form action="{{ route('user.register') }}" method="POST">
        @csrf
        <input name="name" type="text" placeholder="name">
        <input name="email" type="text" placeholder="email">
        <input name="age" type="number" placeholder="age    ">
        <input name="password" type="password" placeholder="password">
        <button>Register</button>
    </form>
</div>
@endsection

