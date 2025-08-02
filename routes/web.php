<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Use a resource controller to automatically handle all CRUD routes.
Route::resource('posts', PostController::class);

// Set the root URL to redirect to the posts index page.
Route::get('/', function () {
    return redirect()->route('posts.index');
});
