<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use Telegram\Bot\Api;
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
    // return view('welcome');

    $response = Telegram::getMe();
    $botId = $response->getId();
    $firstName = $response->getFirstName();
    $username = $response->getUsername();
    echo $botId . '<br />' . $firstName . '<br />' . $username;
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/users', [UserController::class, 'index'])
    ->middleware(['auth'])
    ->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])
    ->middleware(['auth'])
    ->name('users.create');
Route::get('/users/{id}', [UserController::class, 'show'])
    ->middleware(['auth'])
    ->name('users.show');
Route::post('/users', [UserController::class, 'store'])
    ->middleware(['auth'])
    ->name('users.store');
Route::get('/users/{id}/edit', [UserController::class, 'edit'])
    ->middleware(['auth'])
    ->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])
    ->middleware(['auth'])
    ->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])
    ->middleware(['auth'])
    ->name('users.destroy');

Route::post('/abcdrshkdkndwlpxohsxtrojqubfflqdtouzngqvckmbqkkglpmqxvhtxcptndsl/webhook', function () {
    $update = Telegram::commandsHandler(true);

    $chatid = $update->message->chat->id;

    // Commands handler method returns an Update object.
    // So you can further process $update object
    // to however you want.

    return 'ok';
});

require __DIR__.'/auth.php';
