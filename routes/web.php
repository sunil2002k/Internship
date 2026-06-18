<?php

use App\Http\Controllers\UserController;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Support\Facades\Route;

Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/', function () {
    return view('home');
});

Route::prefix('/users')
        ->name('user.')
        ->group(function(){
    Route::get('/', [UserController::class, 'users']);

    Route::get('/{id}', [UserController::class, 'usersById'])->name('show');

    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');

    Route::put('/{id}', [UserController::class, 'updateById'])->name('update');

    Route::delete('/{id}', [UserController::class, 'deleteById'])->name('delete');
});


// here route url = /option/{id?}
// but route name is option.show

// naming the routes is imp because it help for code reusability, easy to change the URL later, no need to update the code everywhere, works well in  the large project 
