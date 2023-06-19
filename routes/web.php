<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\HalamanController;
use App\Http\Controllers\OrganisasiController;
use App\Http\Controllers\PendidikanController;
use App\Http\Controllers\SkillController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PengaturanHalamanController;
use App\Http\Controllers\FrontController;

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

Route::get('/',[FrontController::class,'index']);

Route::prefix('administrator')->group(function () {
    Route::get('/',[LoginController::class,'index']);
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/logout',[LoginController::class,'logout'])->name('logout');
    Route::get('dashboard',[HalamanController::class,'index'])->name('dashboard');
    Route::get('dashboard/create',[HalamanController::class,'create']);
    Route::post('dashboard/store',[HalamanController::class,'store'])->name('dashboard.store');
    Route::get('dashboard/edit/{id}',[HalamanController::class,'edit'])->name('dashboard.edit');
    Route::post('dashboard/update/{id}',[HalamanController::class,'update'])->name('dashboard.update');
    Route::get('dashboard/destroy/{id}',[HalamanController::class,'destroy'])->name('dashboard.destroy');
    Route::resource('organisasi',OrganisasiController::class);
    Route::resource('pendidikan',PendidikanController::class);
    Route::get('skill',[SkillController::class,'index'])->name('skill.index');
    Route::post('skill',[SkillController::class,'update'])->name('skill.update');
    Route::get('profile',[ProfileController::class,'index'])->name('profile.index');
    Route::post('profile',[ProfileController::class,'update'])->name('profile.update');
    Route::get('pengaturanHalaman',[PengaturanHalamanController::class,'index'])->name('pengaturanHalaman.index');
    Route::post('pengaturanHalaman',[pengaturanHalamanController::class,'update'])->name('pengaturanHalaman.update');
});
