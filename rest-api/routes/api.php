<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route untuk menampilkan semua hewan
Route::get('animals', [AnimalController::class, "index"]);

// Route untuk menambahkan hewan
Route::post('animals', [AnimalController::class, "store"]);

// Route untuk mengedit hewan
Route::put('animals/{id}', [AnimalController::class, "update"]);

// Route untuk menghapus hewan
Route::delete('animals/{id}', [AnimalController::class, "destroy"]);

// Route untuk menampilkan semua siswa
Route::get("students", [StudentController::class, "index"]);

// pertemuan 5

// method get
Route::get('/students', [StudentController::class, "index"]);

// method post
Route::post('/students', [StudentController::class, "store"]);

// method update
Route::put('/students/{id}', [StudentController::class, "update"]);

// method delete
Route::delete('/students/{id}', [StudentController::class, "destroy"]);

// methode mendapatkan hasil
Route::get('/students/{id}', [StudentController::class, "show"]);