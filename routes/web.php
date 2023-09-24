<?php

use App\Http\Controllers\ProfileController;
use GuzzleHttp\Middleware;
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

    Route::get('/libros', function () {
        return view('libros');
    })->middleware(['auth', 'verified'])->name('libros');

    Route::get('/libros/create', function () {
        return view('libros.create');
    })->middleware(['auth', 'verified'])->name('libros.create');
    
    Route::get('/estudiantes', function () {
        return view('estudiantes');
    })->middleware(['auth', 'verified'])->name('estudiantes');
    
    Route::get('/docentes', function () {
        return view('docentes');
    })->middleware(['auth', 'verified'])->name('docentes');
    
    Route::get('/atenciones', function () {
        return view('atenciones');
    })->middleware(['auth', 'verified'])->name('atenciones');
    
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
