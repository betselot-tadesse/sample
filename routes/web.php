<?php

use App\Http\Controllers\TestController;
use Illuminate\Support\Facades\Route;
use app\Http\Controllers;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CatagoryController;
use App\Models\Category;
use App\Models\User;


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
Route::get('/home',[TestController::class,'index'])->name('home');

// Category Controller
Route::get('all/cat',[CatagoryController::class,'cat'])->name('all.cat');

Route::post('store/category',[CatagoryController::class,'add'])->name('store.category');
Route::get('category/edit/{id}',[CatagoryController::class,'edit']);
Route::post('category/update/{id}',[CatagoryController::class,'Update']);
Route::get('category/delete/{id}',[CatagoryController::class,'SoftDelete']);
Route::get('category/remove/{id}',[CatagoryController::class,'Remove']);
Route::get('category/restore/{id}',[CatagoryController::class,'Restore']);

// Brand area
Route::get('all/brand',[BrandController::class,'AllBrand'])->name('all.brand');
Route::post('store/brand',[BrandController::class,'insert'])->name('store.brand');
Route::get('brand/edit/{id}',[BrandController::class,'edit']);
Route::post('brand/update/{id}',[BrandController::class,'Update']);
Route::get('brand/delete/{id}',[BrandController::class,'Delete']);

Route::get('/phpinfo', function() {
    return phpinfo();
});










Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {

     $users=User::all();

        return view('dashboard',compact('users'));
    })->name('dashboard');
});
