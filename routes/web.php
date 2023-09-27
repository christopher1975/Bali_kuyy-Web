<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\WisataController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FeedbackController;
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




Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login_admin', [LoginController::class, 'login_admin'])->name('admin.login');
Route::post('/logout', [LoginController::class, 'logout'])->name('admin.logout')
;
Route::get('/register', [RegisterController::class, 'index']);
    Route::post('/register_admin', [RegisterController::class, 'register_admin']);


Route::group(['middleware' => ['auth:admin']], function () {
    
    Route::get('/', function () {
        return view('home');
    })->middleware('auth');
    
    
    
    Route::get('/daftar_wisata', [WisataController::class, 'index'])->middleware('auth');
    Route::get('/tambah_wisata', [WisataController::class, 'tambah_wisata_view'])->middleware('auth');
    Route::post('/tambah_wisata', [WisataController::class, 'tambah_wisata'])->middleware('auth');
    Route::post('/hapus_wisata', [WisataController::class, 'hapus'])->middleware('auth');
    Route::get('/edit_wisata/{id}', [WisataController::class, 'edit_view'])->middleware('auth');
    Route::post('/edit_wisata/{id}', [WisataController::class, 'update'])->middleware('auth');
    
    
    
    Route::get('/daftar_event', [EventController::class, 'index'])->middleware('auth');
    Route::get('/tambah_event', [EventController::class, 'tambah_event_view'])->middleware('auth');
    Route::post('/tambah_event', [EventController::class, 'tambah_event'])->middleware('auth');
    Route::post('/hapus_event', [EventController::class, 'hapus'])->middleware('auth');
    Route::get('/edit_event/{id}', [EventController::class, 'edit_view'])->middleware('auth');
    Route::post('/edit_event/{id}', [EventController::class, 'update'])->middleware('auth');
    
    
    Route::get('/daftar_feedback', [FeedbackController::class, 'index'])->middleware('auth');
    Route::post('/hapus_feedback', [FeedbackController::class, 'hapus_feedback'])->middleware('auth');
});