<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ResumeController;

// Página para upload de currículo (GET)
Route::get('/upload', function () {
    return view('upload'); // View para o upload do currículo
})->name('resume.showUploadForm');

// Rota para fazer o upload do currículo (POST)
Route::post('/resume/upload', [ResumeController::class, 'upload'])->name('resume.upload');

// Rota para analisar o currículo (GET)
Route::get('/resume/analyze/{resume}', [ResumeController::class, 'analyze'])->name('resume.analyze');

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rotas de perfil do usuário
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';