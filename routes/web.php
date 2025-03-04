<?php
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\registerController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\TaskController;
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

Route::get('/', function () {
    return view('welcome');})->name('home');

//Route::get('login',[AuthManager::class,'login'])->name('login'); 
//Route::Post('loginpost',[AuthManager::class,'loginPost'])->name('postlogin'); 
Route::get('register',[registerController::class,'register'])->name('register'); 
Route::post('postRegister',[registerController::class,'Postregister'])->name('postregister'); 
Route::get('login',[loginController::class,'login'])->name('login'); 
Route::Post('loginpost',[loginController::class,'loginPost'])->name('postlogin'); 
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');})->name('home');
        
    Route::get('AddTask',[TaskController::class, 'addTask'])->name('task');
});

