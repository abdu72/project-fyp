<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\HasilPerhitunganController;
use App\Http\Controllers\DashboardHistoryController;
use App\Http\Controllers\AdminCategoryController;
use App\Http\Controllers\Calculation2Controller;



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
    return view('hometry');
});

Route::get('/regulation', function () {
    return view('regulation.index');
});

Route::get('/fixcal', function () {
    return view('calculate.fixcalculate1');
});
Route::get('/indexcal', function () {
    return view('calculate.index');
});
Route::get('/indexcal1', function () {
    return view('calculate.indextry');
});

Route::get('/fixcal2', function () {
    return view('calculate.fixcal2');
});
Route::get('/hometry', function () {
    return view('hometry');
});
Route::get('/fixcal4', function () {
    return view('calculate.fixcal4');
});
Route::get('/detail', function () {
    return view('calculate.detail');
});
Route::get('/detail2', function () {
    return view('calculate.procal.detail');
});
Route::get('/result', function () {
    return view('calculate.result');
});

use App\Http\Controllers\CalculationController;


Route::post('/hitung', [CalculationController::class, 'hitung'])->name('hitung');
Route::post('/proses-hitung', [Calculation2Controller::class, 'hitung2'])->name('hitung2');
//Route::get('/hitung', [CalculationController::class, 'hitung'])->name('hitung');
//Route::get('/hasil-hitung', [CalculationController::class, 'hitung'])->name('hasil-hitung');















//Route::get('/', 'LandingPageController@index')->name('landing-page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
//Route::post('/logout', [LoginController::class, 'logout']);
//Route::get('/login', [LoginController::class, 'logout']);

Route::get('/register', [RegisterController::class, 'index']);
Route::post('/registeruser', [RegisterController::class, 'registeruser']);


//Route::middleware(['auth.once'])->post('/simpan-hasil-perhitungan', [HasilPerhitunganController::class, 'simpanHasilPerhitungan'])->name('hasil-perhitungan');
Route::middleware(['auth.once'])->post('/simpan-hasil-perhitungan', [HasilPerhitunganController::class, 'simpanHasilPerhitungan'])->name('simpan.hasil.perhitungan');
//Route::post('/simpan-hasil-perhitungan', [HasilPerhitunganController::class, 'simpanHasilPerhitungan'])->name('hasil-perhitungan');

Route::get('/hasil-perhitungan', function () {
    // Lakukan sesuatu di sini, atau langsung kembalikan view jika diperlukan
    return view('landing-page');
})->name('hasil-perhitungan');





Route::middleware(['auth'])->group (function () {
    // Rute yang memerlukan autentikasi
    Route::resource('/dashboard/posts', DashboardPostController::class);
    Route::get('/dashboard/crud/add', [DashboardPostController::class, 'create'])->name('dashboard.crud.add');
    Route::post('/dashboard/crud/store', [DashboardPostController::class, 'store'])->name('dashboard.crud.store');
    Route::delete('/wasiat/{user_id}', [DashboardPostController::class, 'destroy'])->name('wasiat.destroy');
    Route::put('/dashboard/posts/{post}', [DashboardPostController::class, 'update'])->name('posts.update');





Route::get('/dashboard/history', [DashboardHistoryController::class, 'index']);



Route::get('/dashboard', function () {
    return view('dashboard.user');
});

Route::get('/procal1', function () {
    return view('calculate.procal.procal1');
});


Route::get('/hasil', function () {
    return view('calculate.procal.hasil');
})->name('hasil');


Route::get('/indextry2', function () {
    return view('calculate.procal.indexrunning');
});

Route::get('/procal2', function () {
    return view('calculate.procal.procal2');
});
Route::get('/procal3', function () {
    return view('calculate.procal.procal3');
});
Route::get('/procal4', function () {
    return view('calculate.procal.procal4');
});

//Route::post('/simpan-hasil-perhitungan', [HasilPerhitunganController::class, 'simpanHasilPerhitungan'])->name('simpan.hasil.perhitungan');
//Route::get('/simpan-hasil-perhitungan', [HasilPerhitunganController::class, 'simpanHasilPerhitungan'])->name('simpan.hasil.perhitungan');


});

//Route::resource('/dashboard/post', AdminCategoryController::class)->name('admin.users');

Route::resource('/dashboard/post', AdminCategoryController::class)->names([
    'index' => 'admin.users.index',
    
])->except('show');

Route::delete('/admin/users/{user}', [AdminCategoryController::class, 'destroy'])->name('admin.users.delete');

Route::get('/dashboard/user-details', [AdminCategoryController::class, 'userDetails'])->name('users.details');