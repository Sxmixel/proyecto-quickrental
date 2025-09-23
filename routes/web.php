<?php


use App\Http\Controllers\ConfiguracioneController;

use App\Http\Controllers\GastoController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ConstruccionController;

use App\Http\Controllers\UserController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\LogoutController;

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Aquí es donde puede registrar rutas web para su aplicación. Estas
| rutas son cargadas por RouteServiceProvider y todas ellas
| ser asignado al grupo de middleware "web". ¡Haz algo genial!
|
*/

Auth::routes();

Route::middleware('auth')->group(function () {

    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

    Route::get('/profile', function () {
        return view('profile');
    })->name('profile');

    Route::resource('configuracion', ConfiguracioneController::class)->only([
        'index', 'edit', 'update'
    ]);

    Route::resource('gastos', GastoController::class);

    Route::resource('construccion', ConstruccionController::class);

    Route::resource('pedidos', PedidoController::class);

    Route::resource('inventarios', InventarioController::class);

    Route::resource('users', UserController::class);

    Route::resource('roles', RolController::class);
    
    Route::resource('permissions', PermissionController::class);

    Route::get('/logout', [LogoutController::class, 'logout'])->name('auth.logout');

}); 
