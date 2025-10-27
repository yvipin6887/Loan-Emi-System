<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\EmiController;
use App\Http\Controllers\EmiCalculatorController;
use App\Http\Controllers\LoginController;

// Login routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', function () {
    auth()->logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');

// Protected routes
Route::middleware(['auth'])->group(function () {
    // Loan pages
    Route::get('/', [LoanController::class, 'index'])->name('loan.index');
    Route::get('/loan/create', [LoanController::class, 'create'])->name('loan.create');
    Route::post('/loan/store', [LoanController::class, 'store'])->name('loan.store');

    // EMI processing
    Route::get('/emi/process', [EmiController::class, 'index'])->name('emi.index');
    Route::post('/emi/process', [EmiController::class, 'process'])->name('emi.process');

    // EMI calculator
    Route::get('/emi/calculator', [EmiCalculatorController::class, 'showForm'])->name('emi.calculator');
    Route::post('/emi/calculator', [EmiCalculatorController::class, 'store'])->name('emi.store');
});
