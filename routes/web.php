<?php

use App\Enums\UserRoleEnum;
use App\Http\Controllers\Dashboard\AdminDashboardController;
use App\Http\Controllers\Dashboard\UserDashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;


Route::get('/home', [HomeController::class, 'index']);
//Route::get('/', function (){
//    return 'qwe';
//});

Route::post('/login', [UserController::class, 'login'])
    ->name('login');

Route::controller(AdminDashboardController::class)
    ->prefix('admin')
    ->middleware(['auth', 'role:admin'])
    ->group(function () {
        Route::get('/', 'index')->name('admin');
    });

Route::controller(UserDashboardController::class)
    ->prefix('user')
    ->middleware(['auth', 'role:user'])
    ->group(function () {
        Route::get('/', 'index')->name('user');
        Route::get('/daily-reports', 'dailyReport')
            ->name('user.daily-reports');
        Route::get('/weekly-reports', 'weeklyReport')
            ->name('user.weekly-reports');
        Route::get('/profile', 'profile')
            ->name('user.profile');
        Route::post('/store', 'store')
            ->name('user.store');
        Route::post('/logout', 'logout')->name('user.logout');
    });








//Route::post('/logout', [UserController::class, 'logout']);
Route::get('/register', function () {
    User::create([
        'name' => 'mira',
        'email' => 'mira@gmail.com',
        'role' => UserRoleEnum::Admin->value,
        'password' => Hash::make('mira@gmail.com'),
    ]);

    User::create([
        'name' => 'vladik',
        'email' => 'vladik@gmail.com',
        'role' => UserRoleEnum::User->value,
        'password' => Hash::make('vladik@gmail.com'),
    ]);
    return 'Users created!';
});
