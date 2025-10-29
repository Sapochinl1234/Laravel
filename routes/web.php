<?php


use App\Http\Controllers\AliadoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JobController;


 
Route::get('/', function () {
    return view('home', [
        'greeting' => 'Bienvenido a la pagina Principal',
        'name' => 'Querido estudiante de la U de Caldas',
    ]);
});

Route::get('/contact', function () {
    return view('contact', [
        'subject' => '¡Gracias por comunicarte con nosotros!',
        'message' => 'Estudiante comprometido con la innovación tecnológica'
    ]);
});

Route::get('/dashboard', function () {
    return view('dashboard');
});



#JobController

// Redirección desde /jobs y /jobs/create hacia /empleos
Route::get('/jobs', function () {
    return redirect()->route('jobs.listado');
});

Route::get('/jobs/create', function () {
    return redirect()->route('jobs.nuevo');
});

// CRUD de empleos
Route::get('/empleos', [JobController::class, 'index'])->name('jobs.listado');
Route::get('/empleos/nuevo', [JobController::class, 'create'])->name('jobs.nuevo');
Route::post('/empleos', [JobController::class, 'store'])->name('jobs.guardar');
Route::get('/empleos/{job}', [JobController::class, 'show'])->name('jobs.detalle');
Route::get('/empleos/{job}/editar', [JobController::class, 'edit'])->name('jobs.modificar');
Route::put('/empleos/{job}', [JobController::class, 'update'])->name('jobs.actualizar');
Route::delete('/empleos/{job}', [JobController::class, 'destroy'])->name('jobs.eliminar');


#trabajo aliados
//  Esta ruta redirige manualmente a la vista de creación de aliados. Es redundante porque justo abajo ya defines esa ruta con controlador.
Route::get('aliados/create', function () {
    return redirect()->route('aliados.create');
});

#Crud Aliados
Route::get('/aliados', [AliadoController::class, 'index'])->name('aliados.index');
Route::get('/aliados/{id}', [AliadoController::class, 'show'])->name('aliados.show');
Route::get('/aliados/tipo/{tipo}', [AliadoController::class, 'tipo'])->name('aliados.tipo');
Route::get('/aliados/create', [AliadoController::class, 'create'])->name('aliados.create');
Route::post('/aliados', [AliadoController::class, 'store'])->name('aliados.store');
Route::get('/aliados/{id}/edit', [AliadoController::class, 'edit'])->name('aliados.edit');
Route::put('/aliados/{id}', [AliadoController::class, 'update'])->name('aliados.update');
Route::delete('/aliados/{id}', [AliadoController::class, 'destroy'])->name('aliados.destroy');
?>


