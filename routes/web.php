<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SpreadsheetController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Auth;
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
    if(Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});



Route::middleware('auth')->group(function () {
    Route::get('/clientes', [CustomerController::class, 'index'])->name('customer.index');    
    Route::get('/upload', [SpreadsheetController::class, 'create'])->name('upload_xls.create');
    Route::post('/upload', [SpreadsheetController::class, 'store'])->name('upload_xls.store');
    Route::get('datatables', [CustomerController::class, 'DataTables'])->name('datatable.post');
    Route::get('/conferencia', [SpreadsheetController::class, 'index'])->name('conferencia.index');
});

require __DIR__.'/auth.php';
