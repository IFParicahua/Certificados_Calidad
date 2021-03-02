<?php

use Illuminate\Support\Facades\Route;
use App\Http\Livewire\DataMecanicaComponent;
use App\Http\Livewire\DataQuimicoComponent;
use App\Http\Livewire\DataGeometriaComponent;
use App\Http\Livewire\DataPaqueteComponent;
use App\Http\Livewire\DataUserComponent;
use App\Http\Livewire\DataNewPackage;
use App\Http\Livewire\DataCertificadoComponent;
use App\Http\Livewire\DataNewCertificado;

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
})->name('index');

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/datos_mecanicos', DataMecanicaComponent::class)->name('datos.mecanicos');
    Route::get('/datos_quimicos', DataQuimicoComponent::class)->name('datos.quimicos');
    Route::get('/datos_geometricos', DataGeometriaComponent::class)->name('datos.geometricos');
    Route::get('/paquetes', DataPaqueteComponent::class)->name('paquetes');
    Route::get('/permisos', DataUserComponent::class)->name('permisos');
    Route::get('/nuevo_paquete', DataNewPackage::class)->name('save');
    Route::get('/certificados', DataCertificadoComponent::class)->name('certificados');
    Route::get('/save_certify', DataNewCertificado::class)->name('save.certify');

    Route::get('/paquete_pdf/{id}', [App\Http\Controllers\PaquetePdfController::class, 'generate'])->name('paquete_pdf');
    Route::get('/certificado_pdf/{id}', [App\Http\Controllers\CertifyPdfController::class, 'showPDF'])->name('certificado_pdf','.*');
});
Route::middleware(['admin'])->group(function () {

});
