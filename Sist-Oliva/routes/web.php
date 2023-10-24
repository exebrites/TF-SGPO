<?php

use App\Http\Controllers\BocetoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutContorller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\DisenioController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\PruebaController;
use App\Mail\PagoMailable;
use App\Models\Producto;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Mail;
use App\Mail\prueba;
use GuzzleHttp\Psr7\Request;

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


Route::resource('/bocetos',BocetoController::class);


Route::get('/email', function () {

    Mail::to('exequiel@gmail.com')->send(new prueba);
    return 'mensaje enviado';
});

/*RUTAS DE PRUEBAS*/


Route::get('/prueba', [PruebaController::class, 'index'])->name('prueba.index');


/*FIN RUTAS DE PRUEBAS*/

/** RUTAS DE DISEÑOS
 * 
 */
// Route::post('/prueba',[PruebaController::class,'imagen'])->name('prueba');
Route::resource('/disenios', DisenioController::class);
// Route::post('/disenios', [PruebaController::class, 'imagen'])->name('');



/**FIN RUTAS DE DISEÑOS
 * 
 */





/**RUTAS DE MAILS
 * 
 * 
 * 
 * 
 * 
 */
Route::get('/pago', [MailController::class, 'pago'])->name('pago');
Route::post('/comprobante', [MailController::class, 'comprobante'])->name('comprobante');


Route::resource('/comprobantes',ComprobanteController::class);
/**FIN RUTAS DE MAILS
 * 
 * 
 * 
 */

/*RUTAS DEL ABM PEDIDOS*/
Route::resource('pedidos', PedidoController::class);
Route::get('/procesar', [PedidoController::class, 'procesarPedido'])->name('procesarPedido.procesar');
Route::get('/pedidoCliente',[PedidoController::class,'pedidoCliente'])->name('pedidoCliente');


/*RUTAS DEL ABM CLIENTE*/
Route::resource('clientes', ClienteController::class);




/*RUTAS DEL ABM PRODUCTO*/
Route::get('/productos{id}', [ProductoController::class, 'detalle'])->name('producto.detalle');
Route::resource('productos', ProductoController::class);




/*RUTAS DEL CHECKOUT*/
Route::get('/checkout', [CheckoutContorller::class, 'index'])->middleware(['auth', 'verified'])->name('checkout.index');
Route::get('/checkout{id}', [CheckoutContorller::class, 'show'])->middleware(['auth', 'verified'])->name('checkout.show');






/*RUTAS DEL CARRITO DE COMPRAS*/

Route::get('/', [CartController::class, 'shop'])->name('shop');
Route::get('/cart', [CartController::class, 'cart'])->name('cart.index');
Route::post('/add', [CartController::class, 'add'])->name('cart.store');
Route::post('/update', [CartController::class, 'update'])->name('cart.update');
Route::post('/remove', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/clear', [CartController::class, 'clear'])->name('cart.clear');
//


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
