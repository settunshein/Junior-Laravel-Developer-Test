<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ProfileController;


Route::view('/', 'auth.login');

Route::middleware('auth')->group(function () {
    # User Routes
    Route::resource('user', UserController::class);

    # Company Routes
    Route::resource('company', CompanyController::class);

    # Logout
    Route::get('/logout', function() {
        Auth::guard('web')->logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect('/');
    });
});


require __DIR__.'/auth.php';

# Testing Routes
Route::get('test-r1', function() {
    $user = \App\Models\User::find(1);
    dump( $user->password );
    dd( password_verify('password', $user->password) );
});
