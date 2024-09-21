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

Route::get('/pic', [PicController::class, 'index'])->name('pic.index');


Route::get('/pic-add', function () {
    return view('pic.pic-add');
})->name('pic.add');



Route::post('/pic-add', [PicController::class, 'store'])->name('pic.store');
Route::get('/pic/{id}/edit', [PicController::class, 'edit'])->name('pic.edit');
Route::put('/pic/{id}', [PicController::class, 'update'])->name('pic.update');
Route::delete('/pic/{id}', [PicController::class, 'destroy'])->name('pic.destroy');


