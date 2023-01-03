<?php

use App\Http\Controllers\FileUpload;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DashboardMaterisController;
use App\Http\Controllers\DashboardPelajaransController;
use App\Http\Controllers\DashboardUsersController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/courses', function () {
    return view('courses');
});

Route::get('/404', function () {
    return view('404');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/testimonial', function () {
    return view('testimonial');
});

Route::get('/team', function () {
    return view('team');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/dashboard', function () { 
    return view('dashboard.index');
})->middleware('auth');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index'])->middleware("guest");
Route::post('/register', [RegisterController::class, 'store']);


Route::resource('dashboard/pelajarans', DashboardPelajaransController::class)->middleware('auth');
Route::resource('dashboard/materis', DashboardMaterisController::class)->middleware('auth');

Route::get('dashboard/users', function(){
    return view('dashboard.users.index');
});

