<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\WelcomeController;
use App\Http\Controllers\Admin\User\UserController;
use App\Http\Controllers\Admin\Auth\LoginController;
use App\Http\Controllers\Admin\Auth\password\ForgetPasswordController;
use App\Http\Controllers\Admin\Auth\password\ResetPasswordController;
use App\Http\Controllers\Admin\Store\StoreController;
use App\Http\Controllers\Admin\User\BlockUserController;
use App\Http\Controllers\Admin\Charity\CharityController;
use App\Http\Controllers\Admin\Contact\ContactController;
use App\Http\Controllers\Admin\Profile\ProfileController;
use App\Http\Controllers\Admin\Setting\SettingController;
use App\Http\Controllers\Admin\Category\CategoryController;
use App\Http\Controllers\Admin\Mediator\MediatorController;
use App\Http\Controllers\Admin\Category\SubCategoryController;
use App\Http\Controllers\Admin\User\Order\OrderController as OrderReportController;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register Admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "admin" middleware group. Now create something great!
|
*/


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {

    // Auth Routes
    Route::controller(LoginController::class)->group(function () {
        Route::get('/login', 'showLoginForm')->name('showLogin');
        Route::post('/login/check', 'check')->name('check');
        Route::post('/logout', 'logout')->name('logout');
    });

    // Forget Password Routes
    Route::controller(ForgetPasswordController::class)->name('password.')->prefix('password')->group(function () {
        Route::get('/forgot', 'showEmailForm')->name('forgot');
        Route::post('/verify', 'getVerficationCode')->name('send.verfication.code');
        Route::get('{email}/otp-form' , 'otpForm')->name('otp.form');
        Route::post('/check-otp', 'checkOtp')->name('check.otp');

    });
    Route::controller(ResetPasswordController::class)->name('password.')->prefix('password')->group(function () {
        Route::get('/reset-form', 'showResetForm')->name('resetform');
        Route::post('/reset', 'resetPassword')->name('reset');

    });


    // Welcome Route
    Route::get('/welcome', [WelcomeController::class, 'index'])->name('welcome');


    // Users Routes
    Route::controller(UserController::class)->prefix('users')->name('users.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all', 'getall')->name('getall');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/show', 'show')->name('show');
        Route::delete('/delete', 'delete')->name('delete');
    });
    Route::controller(BlockUserController::class)->prefix('users-blocked')->name('users.blocked.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all', 'getall')->name('getall');
        Route::get('/{id}/block', 'block')->name('block');
        Route::get('/{id}/retrieve', 'retrieve')->name('retrieve');
    });

    // Routes User Orders Reports
    Route::controller(OrderReportController::class)->prefix('users/orders')->name('users.orders.')->group(function () {
        Route::get('/{id}/detail', 'detail')->name('detail');
    });

    // Categories Routes
    Route::controller(CategoryController::class)->prefix('categories')->name('categories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all', 'getAll')->name('getall');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/delete', 'delete')->name('delete');
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/{id}/restore', 'restore')->name('restore');
        Route::get('/{id}/force-delete', 'forceDelete')->name('forcedelete');
    });
    // Sub Categories Routes
    Route::controller(SubCategoryController::class)->prefix('sub-categories')->name('subcategories.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all', 'getAll')->name('getall');
    });

    // Setting Routes
    Route::controller(SettingController::class)->prefix('settings')->name('settings.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::put('/update/{id}', 'update')->name('update');
    });

    // Mediators Routes
    Route::controller(MediatorController::class)->prefix('mediators')->name('mediators.')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/create', 'create')->name('create');
        Route::post('/store', 'store')->name('store');
        Route::get('/{id}/edit', 'edit')->name('edit');
        Route::put('/{id}/update', 'update')->name('update');
        Route::delete('/{id}/destroy', 'destroy')->name('destroy');
        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/{id}/restore', 'restore')->name('restore');
        Route::delete('/{id}/forceDelete', 'forceDelete')->name('forceDelete');
    });

    // Contacts Route
    Route::controller(ContactController::class)->name('contacts.')->prefix('contacts')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/old', 'old')->name('old');
        Route::get('/old/{id}/delete', 'delete')->name('old.delete');
        Route::get('/replay/{contact}', 'replay')->name('replay');
        Route::post('/send-replay', 'sendReplay')->name('send');
        Route::get('old/delete-all', 'deleteAll')->name('old.deleteAll');
    });


    // Charities Routes
    Route::controller(CharityController::class)->name('charities.')->prefix('charities')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all-approved', 'getallApproved')->name('getallApproved');

        Route::get('/wating', 'wating')->name('wating');
        Route::get('/get-all-pending', 'getallPending')->name('getallPending');

        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/{id}/restore', 'restore')->name('restore');

        Route::get('/{id}/show', 'show')->name('show');
        Route::delete('/destroy', 'destroy')->name('destroy');
        Route::get('/{id}/force-delete', 'forceDelete')->name('forcedelete');

        Route::get('/{id}/accept', 'accept')->name('accept');
        Route::get('/{id}/block', 'block')->name('block');
        Route::get('/{id}/active', 'active')->name('active');
        // Route::get('/{id}/cancel', 'cancel')->name('cancel');

    });






    // Stores Routes
    Route::controller(StoreController::class)->name('stores.')->prefix('stores')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/get-all-approved', 'getallApproved')->name('getallApproved');

        Route::get('/wating', 'wating')->name('wating');
        Route::get('/get-all-pending', 'getallPending')->name('getallPending');

        Route::get('/trashed', 'trashed')->name('trashed');
        Route::get('/{id}/restore', 'restore')->name('restore');

        Route::get('/{id}/show', 'show')->name('show');
        Route::delete('/destroy', 'destroy')->name('destroy');
        Route::get('/{id}/force-delete', 'forceDelete')->name('forcedelete');

        Route::get('/{id}/accept', 'accept')->name('accept');

        Route::get('/{id}/block', 'block')->name('block');
        Route::get('/{id}/active', 'active')->name('active');
    });


    // Profile Routes
    Route::controller(ProfileController::class)->name('profile.')->prefix('profile')->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/update', 'update')->name('update');
    });
});
