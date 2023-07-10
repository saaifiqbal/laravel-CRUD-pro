<?php

use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\ContactController;

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

Route::get('contacts', [ContactController::class, "index"])->name('contact.index');

Route::post('/contacts', [ContactController::class, "store"])->name('contact.store');

Route::get('/contacts/create',[ContactController::class, "create"])->name('contact.create');

Route::get('/contacts/{id}',[ContactController::class, "show"])->name('contact.show');

Route::put('/contacts/{id}',[ContactController::class, "update"])->name('contact.update');

Route::delete('/contacts/{id}',[ContactController::class, "destroy"])->name('contact.destroy');

Route::get('/contacts/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');














