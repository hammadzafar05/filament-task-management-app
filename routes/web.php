<?php

use App\Livewire\CreateTask;
use App\Livewire\EditTask;
use App\Livewire\Task;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->is_admin) {
            return redirect('admin');
        } else {
            return redirect('dashboard');
        }
    } else {
        return redirect('login');
    }
});

Route::middleware(['auth', 'is.user'])->group(function () {

    Route::view('dashboard', 'dashboard')->name('dashboard');

    Route::get('tasks', Task::class)->name('task');
    Route::get('tasks/create', CreateTask::class)->name('task.create');
    Route::get('tasks/{task}/edit', EditTask::class)->name('task.edit');

    Route::view('profile', 'profile')->name('profile');

});

require __DIR__.'/auth.php';
