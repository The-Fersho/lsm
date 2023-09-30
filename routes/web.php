<?php

use App\Http\Controllers\ProfileController;
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

Route::group(['middleware' => ['auth','verified']], function () {

    //Libros
    Route::get('/libros', function () {
        return view('libros');
    })->name('libros');

    Route::get('/libros/create', function () {
        return view('libros.create');
    })->name('libros.create');

    Route::get('/libros/edit/{id}', function () {
        return view('libros.edit');
    })->name('libros.edit');

    Route::get('/libros/delete/{id}', function () {
        return view('libros.delete');
    })->name('libros.delete');

    //Estudiantes
    Route::get('/estudiantes', function () {
        return view('estudiantes');
    })->name('estudiantes');

    Route::get('/estudiantes/create', function () {
        return view('estudiantes.create');
    })->name('estudiantes.create');

    Route::get('/estudiantes/edit/{id}', function () {
        return view('estudiantes.edit');
    })->name('estudiantes.edit');

    Route::get('/estudiantes/delete/{id}', function () {
        return view('estudiantes.delete');
    })->name('estudiantes.delete');


    //Docentes
    Route::get('/docentes', function () {
        return view('docentes');
    })->name('docentes');

    Route::get('/docentes/create', function () {
        return view('docentes.create');
    })->name('docentes.create');


    Route::get('/docentes/edit/{id}', function () {
        return view('docentes.edit');
    })->name('docentes.edit');

    Route::get('/docentes/delete/{id}', function () {
        return view('docentes.delete');
    })->name('docentes.delete');

    //Atenciones
    Route::get('/atenciones', function () {
        return view('atenciones');
    })->name('atenciones');

    Route::get('/atenciones/create', function () {
        return view('atenciones.create');
    })->name('atenciones.create');


    Route::get('/atenciones/edit/{id}', function () {
        return view('atenciones.edit');
    })->name('atenciones.edit');

    Route::get('/atenciones/delete/{id}', function () {
        return view('atenciones.delete');
    })->name('atenciones.delete');
});




Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
