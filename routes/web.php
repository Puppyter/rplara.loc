<?php

use App\Http\Controllers\CharacterController;
use App\Http\Controllers\CharacterCreateController;
use App\Http\Controllers\MetierController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\InviteController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\SpaRoomController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
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

Route::get('/', [IndexController::class, 'index'])->name('welcome');
Route::resource('users', UserController::class)->middleware('web')->missing(function (Request $request){
    return redirect('users.index');
});
Route::resource('rooms',  RoomController::class)->middleware('web')->missing(function (Request $request){
    return redirect('rooms.index');
})->scoped(['room'=> 'slug']);
Route::any('/rooms/{room:slug}', [SpaRoomController::class,'show'])->middleware('web')->name('rooms.show');
Route::post('/login', [LoginController::class, 'login'])->name('login');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
Route::post('/invite/{room:slug}', [InviteController::class, 'invite'])->name('invite');
Route::post('/invite/please/{room:slug}', [InviteController::class, 'pleaseInvite'])->name('invite.please');
Route::get('/invite/{invite}/decline',[InviteController::class, 'decline'])->name('invite.decline');
Route::get('/invite/{invite}/accept', [InviteController::class,'accept'])->name('invite.accept');
Route::prefix('class')->group(function ()
{
    Route::get('/store', [MetierController::class, 'store'])->name('class.store');
    Route::get('/create', [MetierController::class, 'create'])->name('class.create');
});
Route::prefix('/{player}/character/create/step')->group(function ()
{
    Route::get('/one',[CharacterCreateController::class, 'stepOne'])->name('createCharacter.stepOne');
    Route::any('/two', [CharacterCreateController::class, 'stepTwo'])->name('createCharacter.stepTwo');
    Route::any('/three', [CharacterCreateController::class, 'stepThree'])->name('createCharacter.stepThree');
});
Route::get('/generate/hp', [CharacterCreateController::class,'generateHp'])->name('generateHp');
Route::resource('characters',CharacterController::class)->middleware('web')->missing(function (Request $request){
    return redirect('rooms.index');
});

