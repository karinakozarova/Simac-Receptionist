<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['auth:sanctum', 'verified'])->get('/', function () {
    return Inertia\Inertia::render('Dashboard');
})->name('dashboard');

Route::get('/register', function () {
    return view('auth/register');
})->name('register');

Route::get('/pre-register', function () {
    return view('pre-registration');
});

Route::get('/manportal', function () {
    return view('man-portal');
});
?>
