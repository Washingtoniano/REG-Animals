<?php

use App\Http\Controllers\ListarPersonasController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AnimalController;

Route::get('/', function () {
    return view('welcome');
});
// El grupo aplica /animals a las URL y animals. a los nombres de ruta.
/* Route::prefix('animals')->name('animals.')->group(function () {
    Route::get('/', [AnimalController::class, 'index'])->name('index');
    Route::get('/create', [AnimalController::class, 'create'])->name('create');
    Route::post('/', [AnimalController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [AnimalController::class, 'edit'])->name('edit');
    Route::put('/{id}', [AnimalController::class, 'update'])->name('update');
    Route::delete('/{id}', [AnimalController::class, 'destroy'])->name('destroy');
});
 */
// Registra las rutas REST de animales con nombres como animals.index y animals.update.
Route::resource('animals', AnimalController::class);
Route::post('/animals/reset', [AnimalController::class, 'reset'])->name('animals.reset');

/* //Read-Mostrar listado de animales
Route::get('/animals', [AnimalController::class, 'index'])->name('animals.index');
//Create-Mostrar formulario de creación
Route::get('/animals/create', [AnimalController::class, 'create'])->name('animals.create');
//Add-Guardar animal
Route::post('/animals', [AnimalController::class, 'store'])->name('animals.store');
//Update-Mostrar formulario de edición
Route::get('/animals/{id}/edit', [AnimalController::class, 'edit'])->name('animals.edit')->where('id', '[0-9]+');
//Update-Actualizar animal
Route::put('/animals/{id}', [AnimalController::class, 'update'])->name('animals.update')->where('id', '[0-9]+');
//Delete-Eliminar animal
Route::delete('/animals/{id}', [AnimalController::class, 'destroy'])->name('animals.destroy')->where('id', '[0-9]+'); */


Route::get('/home', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


