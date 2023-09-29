<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutContorller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\ProductoController;
use App\Models\Producto;

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


/*RUTAS DEL ABM CLIENTE*/
Route::resource('clientes',ClienteController::class);




/*RUTAS DEL ABM PRODUCTO*/
Route::resource('productos', ProductoController::class);
Route::get('/productos{id}',[ProductoController::class,'detalle'])->name('producto.detalle');




/*RUTAS DEL CHECKOUT*/
Route::get('/checkout', [CheckoutContorller::class, 'index'])->middleware(['auth', 'verified'])->name('checkout.index');





/*RUTAS DEL CARRITO DE COMPRAS*/

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');


/*RUTAS DEL PANEL DE ADMINISTRACION*/

Route::get('/welcome', function () {
    return view('welcome');
});



/*BREEZE*/
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
    ->name('logout');




require __DIR__ . '/auth.php';
