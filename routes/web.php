<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OpportunityController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['role:Super_User']], function () {
    // Dashboard Controller
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');

    // Opportunity Routes Starts here
    Route::get('opportunities', [OpportunityController::class, 'index'])->name('admin.opportunity.index');
    Route::get('opportunity/create', [OpportunityController::class, 'create'])->name('admin.opportunity.create');
    Route::post('opportunity', [OpportunityController::class, 'store'])->name('admin.opportunity.store');
    Route::get('opportunity/view/{id}', [OpportunityController::class, 'show'])->name('admin.opportunity.show');
    Route::get('opportunity/{id}/edit', [OpportunityController::class, 'edit'])->name('admin.opportunity.edit');
    Route::patch('opportunity/update/{id}', [OpportunityController::class, 'update'])->name('admin.opportunity.update');
    Route::delete('opportunity/{id}', [OpportunityController::class, 'destroy'])->name('admin.opportunity.delete');

    Route::patch('opportunity/update/status/{id}', [OpportunityController::class, 'update_status'])->name('admin.opportunity.status');
    // Opportunity Routes Ends here
});
