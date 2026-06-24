<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\NextUserController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;



Route::post('/register', [UserController::class, 'register'])->name('user.register');

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
Route::get('/', function () {
    return view('home');    
});

Route::prefix('/users')
        ->name('user.')
        ->group(function(){
    Route::get('/', [UserController::class, 'users']);

    Route::get('/deletedOne', [UserController::class, 'getOnlyDeletedOne'])->name('getDeletedOne');

    Route::get('/{id}', [UserController::class, 'usersById'])->name('show');

    Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');

    Route::put('/{id}', [UserController::class, 'updateById'])->name('update');

    Route::delete('/{id}', [UserController::class, 'deleteById'])->name('delete');
});


// here route url = /option/{id?}
// but route name is option.show

// naming the routes is imp because it help for code reusability, easy to change the URL later, no need to update the code everywhere, works well in  the large project 

// using resource controller for job
Route::resource('job', JobController::class);


// performing CRUD operation using resource controller for books  apiResource will insert /api in the route and we must create it in api.php file while resource won't.

Route::resource('books', BookController::class);

Route::resource('admin', AdminController::class);

Route::resource('nextUser', NextUserController::class);

route::get('/template',[TemplateController::class, 'index']);