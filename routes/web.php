<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StoriesController;
use App\Http\Controllers\Admin\AdminStoriesController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

use App\Http\Controllers\DashboardController;
use App\Http\Middleware\CheckAdmin;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('stories', StoriesController::class);
});

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard.index');

Route::get('/story/{activeStory:slug}', [DashboardController::class, 'show'])
    ->name('dashboard.show');

Route::get('/email', [DashboardController::class, 'email'])
    ->name('dashboard.email');

// Route::namespace('Admin')->prefix('admin')->group(function() {
//     Route::get('/deleted_stories', [StoriesController::class, 'index'])
//         ->name('admin.stories.index');
// }); Not working. It's not using the stories in the Admin folder

Route::namespace('Admin')->prefix('admin')->middleware(['auth', CheckAdmin::class])->group(function () {
    Route::get('/deleted_stories', [AdminStoriesController::class, 'index'])
        ->name('admin.stories.index');

    Route::put('/stories/restore/{id}', [AdminStoriesController::class, 'restore'])
        ->name('admin.stories.restore');

    Route::delete('/stories/delete/{id}', [AdminStoriesController::class, 'delete'])
        ->name('admin.stories.delete');
});
