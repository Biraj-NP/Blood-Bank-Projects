<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BloodRequestController;
use App\Http\Controllers\DonorController;
use App\Http\Controllers\PageController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| PUBLIC ROUTES
|--------------------------------------------------------------------------
*/

Route::get('/', [PageController::class, 'homePage'])
    ->name('home');

Route::get('/about', [PageController::class, 'aboutPage'])
    ->name('about');

Route::get('/campaigns', [PageController::class, 'campaignsPage'])
    ->name('campaigns');

Route::get('/hospitals', [PageController::class, 'hospitalPage'])
    ->name('hospitals');

Route::get('/search', [PageController::class, 'searchPage'])
    ->name('search');


/*
|--------------------------------------------------------------------------
| GUEST ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | LOGIN
    |--------------------------------------------------------------------------
    */

    Route::get('/login', [AuthController::class, 'login'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'authenticate'])
        ->name('login.authenticate');


    /*
    |--------------------------------------------------------------------------
    | REGISTER
    |--------------------------------------------------------------------------
    */

    Route::get('/register', [AuthController::class, 'register'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'store'])
        ->name('register.store');
});


/*
|--------------------------------------------------------------------------
| AUTHENTICATED USER ROUTES
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    /*
    |--------------------------------------------------------------------------
    | CONTACT
    |--------------------------------------------------------------------------
    */

    Route::get('/contact', [PageController::class, 'contactPage'])
        ->name('contact');

    Route::post('/contact/store', [PageController::class, 'contactSave'])
        ->name('contactSave');


    /*
    |--------------------------------------------------------------------------
    | BLOOD REQUEST
    |--------------------------------------------------------------------------
    */

    Route::get('/blood-request', [
        BloodRequestController::class,
        'bloodRequest'
    ])->name('blood_request');

    Route::post('/blood-request/save', [
        BloodRequestController::class,
        'bloodRequestSave'
    ])->name('blood_request_save');


    /*
    |--------------------------------------------------------------------------
    | DONOR REGISTRATION
    |--------------------------------------------------------------------------
    */

    Route::get('/doner_register', [
        DonorController::class,
        'donorPage'
    ])->name('doner_register');

    Route::post('/donor-register', [
        DonorController::class,
        'donorSave'
    ])->name('donor.register.save');


    /*
    |--------------------------------------------------------------------------
    | LOGOUT
    |--------------------------------------------------------------------------
    */

    // Normal logout
    Route::get('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout');

    // POST logout पनि support गर्ने
    Route::post('/logout', [
        AuthController::class,
        'logout'
    ])->name('logout.post');
});
