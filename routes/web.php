<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\OpportunityController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\StripeController;

Route::get('/', [StripeController::class, 'index'])->name('stripe.index');
Route::post('stripe/checkout', [StripeController::class, 'checkout'])->name('stripe.checkout');
Route::get('stripe/success', [StripeController::class, 'success'])->name('stripe.success');

Auth::routes();
Route::get('register', function () {
    return redirect()->route('login');
});

Route::get('/opportunities', [HomeController::class, 'index'])->name('home');
Route::get('/opportunity/{id}', [HomeController::class, 'view_opportunity'])->name('user.view.opportunity');
Route::post('opportunity/feedback/{id}', [HomeController::class, 'store_feedback'])->name('user.feedback.store');
Route::get('filter/opportunity', [HomeController::class, 'filter_opportunities'])->name('user.filter.opportunities');

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
    Route::get('opportunity/filter', [OpportunityController::class, 'filter_opportunities'])->name('admin.opportunity.filter');

    Route::patch('opportunity/update/status/{id}', [OpportunityController::class, 'update_status'])->name('admin.opportunity.status');
    Route::post('opportunity/assign_users/{opp_id}', [OpportunityController::class, 'assign_users'])->name('admin.opportunity.assign.users');
    Route::get('opportunity/{opp_id}/detach/{usr_id}', [OpportunityController::class, 'detach_user'])->name('admin.opportunity.detach.user');
    // Opportunity Routes Ends here

    // Users Routes Starts here
    Route::get('users', [UserController::class, 'index'])->name('admin.user.index');
    // Users Routes ends here
});
