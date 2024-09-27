<?php

use App\Http\Controllers\Booking\BookingController;
use App\Http\Controllers\BookingUser\BookingUserController;
use App\Http\Controllers\Pic\PicController;
use App\Http\Controllers\Ruangan\RuanganController;
use App\Models\Ruangan;
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

// Route::get('/', function () {
//     // Cek apakah user sudah login
//     if (Auth::check()) {
//         // Jika sudah login, arahkan ke halaman home atau halaman lain
//         return redirect()->route('home');
//     } else {
//         // Jika belum login, arahkan ke halaman login
//         // return redirect()->route('login');
//         return redirect()->route('login');
//     }
// });

Auth::routes();

// Route::get('/', 'WelcomeController@index')->name('welcome');
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

Route::get('/ruangan', [RuanganController::class, 'index'])->name('ruangan.index');
Route::get('/ruangan-add', [RuanganController::class, 'create'])->name('ruangan.add');
Route::post('/ruangan-add', [RuanganController::class, 'store'])->name('ruangan.store');
Route::get('/ruangan/{id}/edit', [RuanganController::class, 'edit'])->name('ruangan.edit');
Route::put('/ruangan/{id}', [RuanganController::class, 'update'])->name('ruangan.update');
Route::delete('/ruangan/{id}', [RuanganController::class, 'destroy'])->name('ruangan.destroy');

Route::get('/check-booking', [BookingController::class, 'checkBooking']);
Route::get('booking', [BookingController::class, 'index'])->name('booking.index');
Route::post('/booking/response/{id}', [BookingController::class, 'response'])->name('booking.response');
Route::get('/booking-add', [BookingController::class, 'create'])->name('booking.add');
Route::post('/booking-add', [BookingController::class, 'store'])->name('booking.store');
<<<<<<< HEAD









// routing user
Route::get('/booking-user', [BookingUserController::class, 'create'])->name('booking-user.add');
=======
Route::get('/booking/{id}/edit', [BookingController::class, 'edit'])->name('booking.edit');
Route::put('/booking/{id}', [BookingController::class, 'update'])->name('booking.update');
Route::delete('/booking/{id}', [BookingController::class, 'destroy'])->name('booking.destroy');
>>>>>>> origin/main
