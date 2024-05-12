<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemaController;
use App\Models\Artista;
use App\Models\Tema;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::resource('albumes', AlbumController::class )
-> parameters(['albumes' => 'album']);
Route::resource('artistas', ArtistaController::class);
Route::resource('temas', TemaController::class);

Route::get('/temas/asignar/{tema}', function (Tema $tema) {
    return view('temas.asignar', [
        'tema' => $tema,
    ]);
})->name('temas.asignar');

Route::get('/artistas/albumes/{artista}', function (Artista $artista) {
    return view('artistas.albumes', [
        'artista' => $artista,
    ]);
})->name('artistas.albumes');

require __DIR__.'/auth.php';
