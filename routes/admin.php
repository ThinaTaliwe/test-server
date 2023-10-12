<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;

/**
 * Admin routes group.
 */
Route::group(
    [
        'prefix' => 'admin',
        'middleware' => ['auth'],
    ],
    function () {
        /**
         * Resource routes for user management.
         */
        Route::resource('user', UserController::class);

        /**
         * Resource routes for permission management.
         */
        Route::resource('permission', PermissionController::class);

        /**
         * Resource routes for role management.
         */
        Route::resource('role', RoleController::class);

        /**
         * Route for displaying account information edit form.
         */
        Route::get('edit-account-info', [UserController::class, 'accountInfo'])->name('admin.account.info');

        /**
         * Route for storing updated account information.
         */
        Route::post('edit-account-info', [UserController::class, 'accountInfoStore'])->name('admin.account.info.store');

        /**
         * Route for storing updated password.
         */
        Route::post('change-password', [UserController::class, 'changePasswordStore'])->name('admin.account.password.store');

        /**
         * Route for displaying admin home page.
         */
        Route::get('/', function () {
            // $layout = config('layout.current');
            return view('home');
        })->name('admin.home');

        /**
         * Route for displaying the homepage.
         */
    },
);
