<?php

use App\Http\Controllers\DokterAPIController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PasienAPIController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\SoalController;
use Illuminate\Support\Facades\Route;

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

// Landing Page
Route::get("/", [LandingController::class, "index"]);

// Soal Page
Route::get("/soal", [SoalController::class, "index"]);

Route::resource("/pasien", PasienController::class);
Route::get("/api/pasien/{id}", [PasienAPIController:: class, "findOne"]);
Route::resource("/dokter", DokterController::class);
Route::get("/api/dokter/{id}", [DokterAPIController:: class, "findOne"]);
