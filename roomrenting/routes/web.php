<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CreateRoomController;
use App\Http\Controllers\UserController;
use App\Mail\TestMail;
use App\Mail\BookingMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\UserAuthController;

Route::get('/', function () {
    return view('welcome');
});

//First Email - simple Email
Route::get("/email-1", function(){
    $name = "Sanjay";
    $from = "Online Web Tutor";

    Mail::to("tobteng003@gmail.com")->send(new TestMail(compact("name", "from")));

    dd("Email Send Successfully");
});

//booking mail 

Route::get('rooms/{id}', [UserController::class, 'show'])->name('user.show');
Route::post('rooms/{id}/book', [UserController::class, 'book'])->name('user.book');
Route::get('booking/response', [UserController::class, 'handleBookingResponse'])->name('booking.response');

//
Route::get('rooms', [UserController::class, 'index'])->name('user.index');
Route::get('rooms/{id}', [UserController::class, 'show'])->name('user.show');

// user auth route
Route::controller(UserAuthController::class)->group(function () {
    Route::get('user/register', 'register')->name('user.register');
    Route::post('user/register', 'registerSave')->name('user.register.save');

    Route::get('user/login', 'login')->name('user.login');
    Route::post('user/login', 'loginAction')->name('user.login.action');

    Route::get('user/logout', 'logout')->middleware('auth')->name('user.logout');
});

Route::middleware('auth')->group(function () {
    Route::get('user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
});

// admin auth route
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

        
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});