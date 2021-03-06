<?php

use App\Http\Controllers\PagesController;
use App\Http\Controllers\QuizController;
use App\Http\Controllers\RaffleController;
use App\Http\Controllers\RoundController;
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

Route::get('/', [PagesController::class, 'index'])->name('login');
Route::get('/register', [PagesController::class, 'registrationForm']);
Route::post('/register', [PagesController::class, 'register']);
Route::post('/login', [PagesController::class, 'login']);

Route::group(['middleware'=>'auth'], function() {
    Route::get('/logout', [PagesController::class, 'logout']);
    Route::get('/quiz/edit/{quiz}', [QuizController::class, 'edit']);
    Route::get('/quiz/create', [QuizController::class, 'create']);
    Route::get('/quiz/{quiz}', [QuizController::class, 'show']);
    Route::post('/quiz', [QuizController::class, 'store']);
    Route::patch('/quiz/{quiz}', [QuizController::class, 'addRound']);

    Route::get('/round/{round}/activate',[RoundController::class, 'activate']);
    Route::get('/round/{round}/close',[RoundController::class, 'close']);
    Route::get('/round/{round}/modify',[RoundController::class, 'modify']);
    Route::get('/round/{round}/add-question', [RoundController::class, 'addQuestionForm']);
    Route::post('/round/{round}/add-question', [RoundController::class, 'addQuestion']);
    Route::get('/round/{round}/attempt', [RoundController::class, 'attempt']);
    Route::post('/round/{round}/attempt', [RoundController::class, 'submitAttempt']);
    Route::get('/round/{round}/summary', [RoundController::class, 'summary']);
    Route::post('/round/{round}/qualify', [RoundController::class, 'qualify']);

    Route::get('/question/{question}/edit', [RoundController::class, 'editQuestionForm']);
    Route::put('/question/{question}/edit', [RoundController::class, 'editQuestion']);
    Route::get('/question/{question}/delete', [RoundController::class, 'deleteQuestion']);

    Route::get('/result/{attempt}', [RoundController::class, 'showResult']);

    Route::get('/raffle', [RaffleController::class, 'index']);
    Route::post('/raffle-item', [RaffleController::class, 'addItem']);
    Route::post('/raffle-winner', [RaffleController::class, 'raffleWinner']);
    Route::get('/raffle/{item}', [RaffleController::class, 'raffleAnItem']);
});



