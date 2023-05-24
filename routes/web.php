<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
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

Route::get('/dashboard', function () {
    return redirect('/admin-panel');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware('auth','admin')->group(function(){
    Route::get('/admin-panel',[IndexController::class,'index'])->name('index');
    Route::get('/admin-panel-add-product',[IndexController::class,'addProduct'])->name('addProduct');
    Route::post('/admin-panel-add-product',[IndexController::class,'storeProduct'])->name('storeProduct');
    Route::get('/admin-panel-delete-product/{id}',[IndexController::class,'deleteProduct'])->name('deleteProduct');
    Route::get('/admin-panel-edit-product/{id}',[IndexController::class,'editView'])->name('editView');
    Route::post('/admin-panel-edit-product/{id}',[IndexController::class,'update'])->name('update');
});


require __DIR__.'/auth.php';
