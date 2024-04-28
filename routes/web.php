<?php

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\AuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\ForgetPasswordManager;
use Database\Seeders\BookSeeder;

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
})->name('home');

Route::get('/login', [AuthManager::class, 'login'])->name('login');
Route::post('/login', [AuthManager::class, 'loginPost'])->name('login.post');


Route::get('/registration', [AuthManager::class, 'registration'])->name('registration');
Route::post('/registration', [AuthManager::class, 'registrationPost'])->name('registration.post');

Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');

Route::group(['middleware'=> ['auth']], function () {
    Route::get('/profile', function(){
        return "Hi";
    });
});

Route::get('/forget-password', [ForgetPasswordManager::class, "forgetPassword"])->name("forget.password");
Route::post('/forget-password', [ForgetPasswordManager::class, "forgetPasswordPost"])->name("forget.password.post");

Route::get("/reset-password/{token}", [ForgetPasswordManager::class,"resetPassword"])->name("reset.password");

Route::post("/reset-password", [ForgetPasswordManager::class,"resetPasswordPost"])->name("reset.password.post");

Route::group(['middlware' => ['auth']], function () {
    Route::get('allBooks', [BookController::class, 'GetAll'])->name('allBooks');
    Route::post('newbook', [BookController::class, 'create'])->name('NewBook');
    Route::post('editbook',[BookController::class,'Update'])->name('editBook');
    Route::delete('removebook/{book}',[BookController::class,'remove'])->name('removeBook');
    Route::get('myBooks', [BookController::class, 'GetMyBooks'])->name('UserBooks');
    Route::post('/books/{bookId}/purchase', [BookController::class, 'purchase'])->name('Purchase');
    Route::get('profile',[BookController::class, 'showProfile'])->name('ShowProfile');
});
