<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
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
Route::get('',[PageController::class,'index'])->name('page.index');
Route::get('/page/index',[PageController::class,'index'])->name('page.index');
Route::get('/page/create', [PageController::class,'create'] )->name('page.create');
Route::post('/page/store',[PageController::class,'store'])->name('page.store');
Route::get('/page/{id}/destroy', [PageController::class,'destroy'] )->name('page.destroy');
Route::get('/page/{id}/edit', [PageController::class,'edit'] )->name('page.edit');
Route::patch('/page/{id}/update',[PageController::class,'update'])->name('page.update');