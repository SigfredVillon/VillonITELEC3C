<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\BrandController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

//BRAND
Route::get('/brand', [BrandController ::class,'index'])->name('brand');

Route::post('/brand/add', [BrandController::class,'AddBrand'])->name('add.brand');

Route::get('/brand/edit/{id}', [BrandController::class,'EditBrand']);

Route::post('/brand/update/{id}', [BrandController::class,'UpdateBrand']);

Route::get('/brand/remove/{id}', [BrandController::class,'RemoveBrand']);

Route::get('/brand/restore/{id}', [BrandController::class,'RestoreBrand']);

Route::get('/brand/delete/{id}', [BrandController::class,'DeleteBrand']);




});

Route::get('/all/category',[CategoryController::class,'displayCategories'])->name('categories');

Route::post('/category/add',[CategoryController::class,'AddCat'])->name('add.categories');

Route::get('/category/edit/{id}',[CategoryController::class,'Edit']);

Route::post('/category/update/{id}',[CategoryController::class,'Update'])->name('update.categories');

