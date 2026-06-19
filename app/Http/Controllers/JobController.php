<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function index()
{
    return Job::all();
}

public function create()
{
    return view('jobs.create');
}

public function store(Request $request)
{
    $incomingFields = $request->validate([
        'queue' => ['required', 'min:3', 'max:10'],
        'payload' => ['required'],
        'attempts' => ['required', 'integer', 'min:3', 'max:10'],
    ]);

    $job = Job::create($incomingFields);

    return response()->json([
        'message' => 'Job created successfully',
        'job' => $job,
    ], 201);
}

public function show(Job $job)
{
    return $job;
}
}
