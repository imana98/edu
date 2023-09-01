<?php

use App\Http\Controllers\ComponentTestController;
use App\Http\Controllers\User\SeminarController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('user.welcome');
});

Route::middleware('auth:users')->group(function () {
    Route::get('/', [SeminarController::class, 'index'])->name('seminars.index');
    Route::get('show/{id}', [SeminarController::class, 'show'])->name('seminars.show');
    Route::get('entry/{id}', [SeminarController::class, 'entry'])->name('seminars.entry');
    Route::get('reserve', [SeminarController::class, 'reserve'])->name('seminars.reserve');
    Route::get('edit/{id}', [SeminarController::class, 'edit'])->name('seminars.edit');
    Route::get('detail/{id}', [SeminarController::class, 'detail'])->name('seminars.detail');
    Route::get('profile', [SeminarController::class, 'profile'])->name('seminars.profile');
    Route::post('image', [SeminarController::class, 'image'])->name('seminars.image');
    Route::get('detail/{id}', [SeminarController::class, 'detail'])->name('seminars.detail');

    Route::get('edit02', [SeminarController::class, 'edit02'])->name('seminars.edit02');
    Route::post('edit03', [SeminarController::class, 'edit03'])->name('seminars.edit03');
    Route::get('edit04', [SeminarController::class, 'edit04'])->name('seminars.edit04');
});

// Route::get('/dashboard', function () {
//     return view('user.dashboard');
// })->middleware(['auth:users'])->name('dashboard');

Route::get('/component-test1', [ComponentTestController::class, 'showComponent1']);
Route::get('/component-test2', [ComponentTestController::class, 'showComponent2']);


require __DIR__.'/auth.php';
