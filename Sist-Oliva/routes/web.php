<?php

use App\Http\Controllers\BocetoController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutContorller;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ComprobanteController;
use App\Http\Controllers\DisenioController;
use App\Http\Controllers\EntregaController;
use App\Http\Controllers\fileController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\MaterialController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PruebaController;
use App\Mail\PagoMailable;
use App\Models\Producto;
use Illuminate\Routing\RouteRegistrar;
use Illuminate\Support\Facades\Mail;
use App\Mail\prueba;
use App\Models\MaterialProveedor;
use App\Models\Pedido;
use App\Models\Proveedor;
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



/*RUTAS DE PRUEBAS*/


Route::get('/prueba', [PruebaController::class, 'index'])->name('prueba.index');
Route::get('/prueba/descargar{id}', [PruebaController::class, 'descargar'])->name('prueba.d');

Route::get('home', function () {
    return view('home');
});
/*FIN RUTAS DE PRUEBAS*/






//RUTAS MATERIAL
Route::resource('/materiales', MaterialController::class);
Route::get('/historialMateriales', function () {
    $mp = MaterialProveedor::all();
    return view('historialmateriales', compact('mp'));
})->name('historialMateriales');

//RUTAS PROVEEDOR
Route::resource('/proveedores', ProveedorController::class);



//RUTAS ENTREGA
Route::resource('entrega', EntregaController::class);


//RUTA BOCETO
Route::resource('/bocetos', BocetoController::class);



//RUTA CORREO


/** RUTAS DE DISEÑOS
 * 
 */
Route::resource('/disenios', DisenioController::class);
Route::get('/descargar{id}', [DisenioController::class, 'descargar'])->name('disenios.descargar');




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


Route::resource('/comprobantes', ComprobanteController::class);
/**FIN RUTAS DE MAILS
 * 
 * 
 * 
 */

/*RUTAS DEL ABM PEDIDOS*/
Route::resource('pedidos', PedidoController::class);
Route::get('/procesar', [PedidoController::class, 'procesarPedido'])->name('procesarPedido.procesar')->middleware(['auth', 'verified']);
Route::get('/pedidoCliente', [PedidoController::class, 'pedidoCliente'])->name('pedidoCliente');
Route::get('/detallePedido{id}', [PedidoController::class, 'detallePedido'])->name('pedido-detallePedido');

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
