<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\ImageController;

Route::get('/', [ImageController::class, 'listImage'])->name('home');
Route::view('/add-image', 'addImage')->name('add-image');
Route::post('/add-image', [ImageController::class, 'add']);
Route::get('/image-id/{id}', [ImageController::class, 'singleImage'])->name('single-image');
Route::get('delete/{id}', [ImageController::class, 'delete'])->name('delete');
