<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\GradingCriteriaController;
use App\Http\Controllers\EventJudgeController;
use App\Http\Controllers\JudgeGroupController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\Judge\JudgeController;

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
    return view('welcome');
});

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');
Route::get('/events/{event}', [EventController::class, 'show'])->name('events.show');
Route::get('/events/{event}/edit', [EventController::class, 'edit'])->name('events.edit');
Route::put('/events/{event}', [EventController::class, 'update'])->name('events.update');
Route::delete('/events/{event}', [EventController::class, 'destroy'])->name('events.destroy');


//Grading Criteria routes
Route::get('/events/gradingcriteria/{id}', [GradingCriteriaController::class, 'show'])->name('events.gradingcriteria');
Route::get('/events/{event}/gradingcriteria', [GradingCriteriaController::class, 'index'])->name('gradingcriteria.index');
Route::get('/events/{event}/gradingcriteria/create', [GradingCriteriaController::class, 'create'])->name('gradingcriteria.create');
Route::post('/events/{event}/gradingcriteria', [GradingCriteriaController::class, 'store'])->name('gradingcriteria.store');

//Group routes
Route::get('/events/{event}/groups/{group}', [EventController::class, 'showGroups'])->name('events.groups.show');
Route::get('/events/groups/create/{id}', [EventController::class, 'createGroups'])->name('events.groups.create');
Route::post('/events/{event}/groups', [EventController::class, 'storeGroups'])->name('events.groups.store');
Route::get('/events/{event}/groups/{group}/edit', [EventController::class, 'editGroups'])->name('events.groups.edit');
Route::put('/events/{event}/groups/{group}', [EventController::class, 'updateGroups'])->name('events.groups.update');
Route::delete('/events/{event}/groups/{group}', [EventController::class, 'destroyGroups'])->name('events.groups.destroy');

//EventJudge and JudgeGroup routes
Route::get('/events/{eventID}/eventjudges', [EventJudgeController::class, 'show'])->name('events.judges.show');
Route::get('/events/{event}/judges', [EventJudgeController::class, 'index'])->name('events.judges.index');
Route::post('/events/{event}/judges', [EventJudgeController::class, 'store'])->name('events.judges.store');
Route::get('/judges/{judge}/groups', [JudgeGroupController::class, 'index'])->name('judges.groups.index');
Route::post('/judges/{judge}/groups', [JudgeGroupController::class, 'store'])->name('judges.groups.store');

//Participants routes
Route::get('/events/{eventID}/participants', [ParticipantController::class, 'show'])->name('events.participants.show');
Route::get('/events/{event}/participants/create', [ParticipantController::class, 'create'])->name('events.participants.create');
Route::post('/events/{event}/participants', [ParticipantController::class, 'store'])->name('events.participants.store');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::middleware(['auth', 'checkrole:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard'); // Ensure this view exists
    })->name('admin.dashboard');
    // Define more admin routes here
});

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    // Define other admin routes here
});

Route::middleware(['auth', 'checkrole:judge'])->group(function () {
    Route::get('/judge/dashboard', function () {
        return view('judge.dashboard'); // Ensure this view exists
    })->name('judge.dashboard');
    // Define more admin routes here
});

Route::middleware(['auth', 'judge'])->prefix('judge')->group(function () {
    Route::get('/dashboard', [JudgeController::class, 'index'])->name('judge.dashboard');
    // Define other admin routes here
});


require __DIR__.'/auth.php';
