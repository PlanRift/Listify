<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DataController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function (){
    return view('index');
})->middleware('auth');
// Login Register
// Route::get('login', [AuthController::class, 'login']);
// Route::post('login', [AuthController::class, 'authenticate']);
// Route::get('logout', [AuthController::class, 'logout']);
// Route::get('list/logout', [AuthController::class, 'logout']);
// Route::get('list/{slug}/logout', [AuthController::class, 'logout']);
// Route::get('register', [AuthController::class, 'registration'])->name('register');
// Route::post('register', [AuthController::class, 'register']);

// Main Page
Route::get('list', [DataController::class, 'index']);

// Create Page
Route::get('list/create', [DataController::class, 'create']);
Route::post('list', [DataController::class, 'store']);
Route::get('list/{slug}/edit', [DataController::class, 'edit']);
Route::patch('list/{slug}', [DataController::class, 'update']);

// Delete
Route::delete('{slug}/destroy', [DataController::class, 'destroy']);

