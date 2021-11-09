<?php


use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\Auth\LoginController;
use GuzzleHttp\Promise\Create;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can registerregister web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
     return view('auth/login');
 });

Auth::routes();

// Route::view('/','pages.auth.login');
Route::get('/Auth.Login', [App\Http\Controllers\Auth\LoginController::class, '/']);


//dashboard
Route::get('/dashboard', [DashboardController::class, 'index']);
Route::post('/dashboard', [DashboardController::class, 'index']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//Master Admin
Route::get('/user', [UserController::class, 'index']);
Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
Route::post('/user', [UserController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id_user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id_user}', [UserController::class, 'update'])->name('user.update');
Route::get('/user/editprofile/', [UserController::class, 'editprofile'])->name('user.editprofile');
Route::put('/user/updateprofile/{id_user}', [UserController::class, 'updateprofile'])->name('user.updateprofile');
Route::get('/user/destroy/{id_user}', [UserController::class, 'destroy'])->name('user.destroy');

//Penjualan
Route::get('/penjualan', [PenjualanController::class, 'index']);
Route::get('/penjualan/show/{id_penjualan}', [PenjualanController::class, 'show'])->name('penjualan.show');
Route::get('/penjualan/user/', [PenjualanController::class, 'user'])->name('penjualan.user');
Route::get('/penjualan/create', [PenjualanController::class, 'create'])->name('penjualan.create');
Route::post('/penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
Route::post('/penjualan/filter/', [PenjualanController::class, 'filter'])->name('filter');
Route::get('/penjualan/edit/{id_penjualan}', [PenjualanController::class, 'edit'])->name('penjualan.edit');
Route::put('/penjualan/update/{id_penjualan}', [PenjualanController::class, 'update'])->name('penjualan.update');
Route::get('/penjualan/destroy/{id_penjualan}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();

    return Redirect::to('/');
})->name('logout');
