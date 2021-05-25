<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CompraController;

use App\Http\Controllers\EdicioUserController;

use App\Http\Controllers\RoomController;
use App\Http\Controllers\SalasController;

use App\Http\Controllers\VideoController;
use App\Http\Controllers\ReproductorController;

use App\Http\Controllers\JoinedController;

use App\Http\Controllers\MessageController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/update', function(){
    return view('edit');
})->name('update');

Route::get('/pagos', [CompraController::class, 'formdonacion'])->middleware('auth')->name('pagos');
Route::post('/pagar', [CompraController::class, 'donacion'])->middleware('auth')->name('pagar');

Route::get('/dashboard', [SalasController::class, 'recoversalas'])->middleware('auth')->name('dashboard');
Route::get('/crear', [RoomController::class, 'newroom'])->middleware('auth')->name('crear');

Route::get('/sala/{id}', [ReproductorController::class, 'reproductor'])->middleware(['joined', 'auth']);
Route::post('/sala/{id}/video', [VideoController::class, 'newvideo'])->middleware(['joined', 'auth']);
Route::get('/sala/{id}/videos', [VideoController::class, 'recovervideo'])->middleware(['joined', 'auth']);
Route::get('/sala/{id}/mensajes/{chat}', [MessageController::class, 'recovermessage'])->middleware(['joined', 'auth']);
Route::post('/sala/{id}/mensaje/{chat}', [MessageController::class, 'newmessage'])->middleware(['joined', 'auth']);
Route::get('/sala/{id}/participantes', [JoinedController::class, 'recoverusers'])->middleware(['joined', 'auth']);
Route::get('/sala/{id}/expulsar/{user}', [JoinedController::class, 'removeuser'])->middleware(['joined', 'auth']);
Route::get('/sala/{id}/invitacion/{token}', [JoinedController::class, 'invitacion'])->middleware('auth');

Route::post('/updateUser', [EdicioUserController::class, 'edit'])->middleware('auth');

Route::post('/salasUpdate', [EdicioUserController::class, 'updateSales'])->name('salasUpdate')->middleware('auth');
Route::post('/delete', [EdicioUserController::class, 'delete'])->name('delete')->middleware('auth');
require __DIR__.'/auth.php';
