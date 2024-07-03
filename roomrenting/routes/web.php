<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateRoomController;

Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(CreateRoomController::class)->prefix('createroom')->group(function () {
        Route::get('', 'index')->name('createroom');
        Route::get('create', 'create')->name('createroom.create');
        Route::post('create', 'create')->name('createroom.create');
        Route::post('store', 'store')->name('createroom.store');
        Route::get('show/{id}', 'show')->name('createroom.show');
        Route::get('edit/{id}', 'edit')->name('createroom.edit');
        Route::put('edit/{id}', 'update')->name('createroom.update');
        Route::delete('destroy/{id}', 'destroy')->name('createroom.destroy');
        Route::get('/api/rooms', [CreateRoomController::class, 'getAllRooms']);

        
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});