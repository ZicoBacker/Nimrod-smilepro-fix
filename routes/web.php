<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ScheduleController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\DashboardController;
use App\Http\Middleware\AdminMiddleware;


Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/welcome', function () {
    return view('welcome');
});

Route::resource('appointments', AppointmentController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('patients', PatientController::class);
Route::resource('persons', PersonController::class);

Route::get('/banner', function () {
    return view('banner');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::post('/conversations/{conversation}/reply', [MessageController::class, 'reply'])->name('messages.reply');
    Route::post('/conversations', [MessageController::class, 'createConversation'])->name('conversations.create');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::put('/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
});

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/admin/messages', [MessageController::class, 'adminIndex'])->name('messages.admin.index');
    Route::put('/admin/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.admin.read');
    // Beschikbaarheid index
    Route::get('/schedules', [ScheduleController::class, 'index'])->name('schedules.index');

    // Beschikbaarheid create
    Route::get('/schedules/create', [ScheduleController::class, 'create'])->name('schedules.create');

    // Show specific schedule
    Route::get('/schedules/{schedule}', [ScheduleController::class, 'show'])->name('schedules.show');

    // store schedule
    Route::post('/schedules', [ScheduleController::class, 'store'])->name('schedules.store');

    // edit schedule
    Route::get('/schedules/{schedule}/edit', [ScheduleController::class, 'edit'])->name('schedules.edit');

    // update schedule
    Route::patch('/schedules/{schedule}', [ScheduleController::class, 'update'])->name('schedules.update');
});


Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

Route::resource('schedules', ScheduleController::class)->middleware('auth');

Route::middleware(['auth', AdminMiddleware::class])->group(function () {
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::put('/messages/{message}/read', [MessageController::class, 'markAsRead'])->name('messages.read');
});

require __DIR__ . '/auth.php';
