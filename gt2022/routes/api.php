<?php
 
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\Auth\RegistrationController;
use App\Http\Controllers\Auth\VerifyEmailController;
use Illuminate\Support\Facades\Route;
 
Route::post('/login', [LoginController::class, 'login']);
Route::post('/registration', [RegistrationController::class, 'register']);
 
Route::group(['middleware' => ['auth:sanctum']], function ($route) {
    $route->get('/user', [LoginController::class, 'user']);
    $route->post('/logout', [LogoutController::class, 'logout']);
    $route->post('/email/verification-notification', [VerifyEmailController::class, 'resendNotification'])
        ->name('verification.send');
});