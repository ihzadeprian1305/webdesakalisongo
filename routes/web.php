<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\User\UserHomeController;
use App\Http\Controllers\User\UserNewsController;
use App\Http\Controllers\User\UserPhotoController;
use App\Http\Controllers\Admin\AdminNewsController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminPhotoController;
use App\Http\Controllers\User\UserArchiveController;
use App\Http\Controllers\Admin\AdminProfilController;
use App\Http\Controllers\Admin\AdminArchiveController;
use App\Http\Controllers\User\UserStructureController;
use App\Http\Controllers\Admin\AdminStructureController;
use App\Http\Controllers\Admin\AdminCriticAndSuggestionController;

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

// Route::get('/', function () {return view('welcome');});
Route::get('/', [UserHomeController::class, 'index'])->name('beranda');
Route::post('/kritikdansaran', [UserHomeController::class,'store']);
Route::get('/berita', [UserNewsController::class, 'index'])->name('berita');
Route::get('/berita.cari', [UserNewsController::class,'search']);
Route::get('/berita.{id}', [UserNewsController::class, 'show']);
Route::get('/arsip', [UserArchiveController::class, 'index'])->name('arsip');
Route::get('/arsip.cari', [UserArchiveController::class,'search']);
Route::get('/arsip.{id}', [UserArchiveController::class, 'show']);
Route::get('/arsip/{file_name}', [UserArchiveController::class, 'download']);
Route::get('/struktur', [UserStructureController::class, 'index'])->name('struktur');
Route::get('/galeri-foto', [UserPhotoController::class, 'index'])->name('galeri-foto');

// // Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


// Login Admin
Route::get('/admin/login', [LoginController::class,'index'])->name('admin.login');
Route::post('/admin/login', [LoginController::class,'login']);

Route::middleware('auth')->group(function () {
    // Profil
    Route::get('/admin/profil', [AdminProfilController::class,'index'])->name('admin.profil');
    Route::get('/admin/profil.{id}.edit', [AdminProfilController::class,'edit']);
    Route::put('/admin/profil.{id}', [AdminProfilController::class,'update']);

    // User
    Route::get('/admin/user', [AdminUserController::class,'index'])->name('admin.user');
    Route::get('/admin/user.cari', [AdminUserController::class,'search']);
    Route::get('/admin/user.tambah', [AdminUserController::class,'create']);
    Route::post('/admin/user', [AdminUserController::class,'store']);
    Route::get('/admin/user.{id}.edit', [AdminUserController::class,'edit']);
    Route::put('/admin/user.{id}', [AdminUserController::class,'update']);
    Route::get('/admin/user.{id}', [AdminUserController::class,'show']);
    Route::delete('/admin/user.{id}', [AdminUserController::class,'destroy']);
    
    // Archive
    Route::get('/admin/arsip', [AdminArchiveController::class,'index'])->name('admin.arsip');
    Route::get('/admin/arsip.cari', [AdminArchiveController::class,'search']);
    Route::get('/admin/arsip.tambah', [AdminArchiveController::class,'create']);
    Route::post('/admin/arsip', [AdminArchiveController::class,'store']);
    Route::get('/admin/arsip.{id}.edit', [AdminArchiveController::class,'edit']);
    Route::put('/admin/arsip.{id}', [AdminArchiveController::class,'update']);
    Route::get('/admin/arsip.{id}', [AdminArchiveController::class,'show']);
    Route::delete('/admin/arsip.{id}', [AdminArchiveController::class,'destroy']);
    
    // Critics and Suggestions
    Route::get('/admin/kritikdansaran', [AdminCriticAndSuggestionController::class,'index'])->name('admin.kritikdansaran');
    Route::get('/admin/kritikdansaran.cari', [AdminCriticAndSuggestionController::class,'search']);
    Route::get('/admin/kritikdansaran.{id}', [AdminCriticAndSuggestionController::class,'show']);
    Route::delete('/admin/kritikdansaran.{id}', [AdminCriticAndSuggestionController::class,'destroy']);
    
    // News
    Route::get('/admin/berita', [AdminNewsController::class,'index'])->name('admin.berita');
    Route::get('/admin/berita.cari', [AdminNewsController::class,'search']);
    Route::get('/admin/berita.tambah', [AdminNewsController::class,'create']);
    Route::post('/admin/berita', [AdminNewsController::class,'store']);
    Route::get('/admin/berita.{id}.edit', [AdminNewsController::class,'edit']);
    Route::put('/admin/berita.{id}', [AdminNewsController::class,'update']);
    Route::get('/admin/berita.{id}', [AdminNewsController::class,'show']);
    Route::delete('/admin/berita.{id}', [AdminNewsController::class,'destroy']);
    
    // Photo
    Route::get('/admin/foto', [AdminPhotoController::class,'index'])->name('admin.foto');
    Route::get('/admin/foto.cari', [AdminPhotoController::class,'search']);
    Route::get('/admin/foto.tambah', [AdminPhotoController::class,'create']);
    Route::post('/admin/foto', [AdminPhotoController::class,'store']);
    Route::get('/admin/foto.{id}.edit', [AdminPhotoController::class,'edit']);
    Route::put('/admin/foto.{id}', [AdminPhotoController::class,'update']);
    Route::get('/admin/foto.{id}', [AdminPhotoController::class,'show']);
    Route::delete('/admin/foto.{id}', [AdminPhotoController::class,'destroy']);
    
    // Structure
    Route::get('/admin/struktur', [AdminStructureController::class,'index'])->name('admin.struktur');
    Route::get('/admin/struktur.cari', [AdminStructureController::class,'search']);
    Route::get('/admin/struktur.tambah', [AdminStructureController::class,'create']);
    Route::post('/admin/struktur', [AdminStructureController::class,'store']);
    Route::get('/admin/struktur.{id}.edit', [AdminStructureController::class,'edit']);
    Route::put('/admin/struktur.{id}', [AdminStructureController::class,'update']);
    Route::get('/admin/struktur.{id}', [AdminStructureController::class,'show']);
    Route::delete('/admin/struktur.{id}', [AdminStructureController::class,'destroy']);
    
    // Logout Admin
    Route::post('/admin/logout', [LoginController::class,'logout']);
});

Route::get('/linkstorage', function () { $targetFolder = base_path().'/storage/app/public'; $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage'; symlink($targetFolder, $linkFolder); });
