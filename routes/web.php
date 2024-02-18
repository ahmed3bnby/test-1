<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\StatsController;
use App\Http\Controllers\TaskController;

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

// Task 1
Route::get('/', [HomeController::class, 'index']);

Route::get('/dashboard', DashboardController::class)->name('dashboard');


// Task 2
Route::get('/user/{name}', [UserController::class, 'show']);

// Task 3
Route::view('/about', 'pages.about')->name('about');

// Task 4
Route::redirect('log-in', 'login');

// Task 5
Route::middleware('auth')->group(function () {

    
    // Task 6
    Route::prefix('app')->group(function () {

        // Task 7

        // Task 8
        Route::resource('tasks', TaskController::class);

    });

    // Task 9
    Route::prefix('admin')->group(function () {

        // Task 10
        Route::get('/dashboard', AdminDashboardController::class);

        // Task 11
        Route::get('/stats', StatsController::class);

    });

});

// End of the main Authenticated Route Group

// One more task is in routes/api.php

require __DIR__.'/auth.php';
