<?php

use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Provider\ProviderDashboardComponent;

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

Route::get('logout', function () {
    auth()->logout();
    Session()->flush();

    return Redirect::to('/login');
})->name('logout');

Route::get('/', HomeComponent::class)->name('home');

//Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

//Provider
Route::middleware(['auth:sanctum', 'verified', 'authprovider'])->group(function () {
    Route::get('/providerr/dashboard', ProviderDashboardComponent::class)->name('provider.dashboard');
});


//Admin
Route::middleware(['auth:sanctum', 'verified', 'authadmin'])->group(function () {
    Route::get('/admin/dashboard', AdminDashboardComponent::class)->name('admin.dashboard');
});
