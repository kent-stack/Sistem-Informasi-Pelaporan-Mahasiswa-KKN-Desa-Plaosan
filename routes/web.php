<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    $allReports = App\Models\Report::latest()->get();
    $reports = $allReports->take(8);
    return view('home', compact('reports', 'allReports'));
})->name('home');

Route::get('/projects', function () {
    return view('projects');
})->name('projects');

Route::get('/storage/{path}', function ($path) {
    $path = urldecode($path);
    if (str_contains($path, '..')) {
        abort(404);
    }
    $fullPath = storage_path('app/public/' . $path);
    if (!file_exists($fullPath) || !is_readable($fullPath)) {
        abort(404);
    }
    return response()->file($fullPath);
})->where('path', '.*');

Route::get('/participants', function () {
    return view('participants');
})->name('participants');

// Auth Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Protected Routes
Route::middleware(['auth'])->group(function () {
    Route::get('/downloads', function () {
        return view('downloads');
    })->name('downloads');

    Route::get('/report', function () {
        return view('report');
    })->name('report');

    Route::post('/upload', [ReportController::class, 'store'])->name('upload');
});

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

// Admin Routes (Protected by auth and is_admin)
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::middleware([\App\Http\Middleware\EnsureUserIsAdmin::class])->group(function () {
        Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::get('/reports', [AdminController::class, 'index'])->name('reports.index');
        Route::resource('reports', AdminController::class)->except(['create', 'store', 'show', 'index']);
    });
});
