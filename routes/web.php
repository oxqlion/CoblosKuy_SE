<?php

use App\Http\Controllers\CandidateController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SocialController;
use App\Http\Controllers\ElectionController;

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
    return view('auth.login');
});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [ElectionController::class, 'getAllElection'])->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/electiondetail/{id}', [ElectionController::class, 'getElectionData'])->middleware(['auth', 'verified'])->name('electiondetail');
Route::get('/voting/{id}', [ElectionController::class, 'getVotingPage'])->middleware(['auth', 'verified'])->name('voting');
Route::get('/candidatedetail/{id}', [ElectionController::class, 'getCandidateDetail'])->middleware(['auth', 'verified'])->name('candidatedetail');
Route::post('/vote/{id}', [ElectionController::class, 'vote'])->middleware(['auth', 'verified'])->name('vote');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

/**
 * socialite auth
 */
Route::get('/auth/{provider}', [SocialController::class, 'redirectToProvider']);
Route::get('/auth/{provider}/callback', [SocialController::class, 'handleProvideCallback']);

require __DIR__ . '/auth.php';
