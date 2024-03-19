<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ListtodoController;
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
Route::get('/',[ListtodoController::class, 'index']);
Route::get('/lists',[ListtodoController::class, 'index']);
Route::get('/lists/delete/{id}',[ListtodoController::class, 'delete']);
Route::post('/lists',[ListtodoController::class, 'create'])->name('lists');
Route::get('/lists/edit/{id}',[ListtodoController::class, 'edit']);
Route::post('/lists/edit/{id}',[ListtodoController::class, 'update']);
Route::get('/lists/{id}',[ListtodoController::class, 'checkbox'])->name('lists.id');
// Route::post('/lists/deleteSelected', [ListtodoController::class, 'deleteList'])->name('lists.deleteSelected');
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
