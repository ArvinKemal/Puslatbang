<?php

use App\Http\Controllers\Pic\PicController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    // Cek apakah user sudah login
    if (Auth::check()) {
        // Jika sudah login, arahkan ke halaman home atau halaman lain
        return redirect()->route('home');
    } else {
        // Jika belum login, arahkan ke halaman login
        return redirect()->route('login');
    }
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/profile', 'ProfileController@index')->name('profile');
Route::put('/profile', 'ProfileController@update')->name('profile.update');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::get('/pic', function () {
    return view('pic.pic');
})->name('pic');


Route::post('/pic', [PicController::class, 'store'])->name('pic.store');

