<?php
 
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Auth\Events\Verified;
use Illuminate\Support\Facades\Route;
 
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, 'verify'])
    ->middleware(['signed'])->name('verification.verify');