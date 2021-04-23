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
use App\Http\Controllers\ProfilesController;
use App\Http\Middleware\CheckAdmin;
use Intervention\Image\ImageManagerStatic as Image;

require __DIR__ . '/auth.php';

Route::middleware(['auth'])->group(function () {
    Route::resource('stories', StoriesController::class);
    Route::get('/edit-profile', [ProfilesController::class, 'edit'])->name('profiles.edit');
    Route::put('/edit-profile/{user}', [ProfilesController::class, 'update'])->name('profiles.update');
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

Route::get('/image', function () {
    $imagePath = public_path('storage/14550.jpg');
    $writePath = public_path('storage/thumbnail.jpg');

    $img = Image::make($imagePath)->resize(225, 100);
    $img->save($writePath);

    return $img->response('jpg');
});
