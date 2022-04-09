<?php

use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Provider\ProviderDashboardComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\ServicesByCategoryComponent;

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
Route::get('/service-categories', ServiceCategoriesComponent::class)->name('home.service_categories');
Route::get('/{category_slug}/services', ServicesByCategoryComponent::class)->name('home.services_by_category');
Route::get('/service/{service_slug}', ServiceDetailsComponent::class)->name('home.services_details');

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
    Route::get('/admin/service-categories', AdminServiceCategoryComponent::class)->name('admin.service_categories');
    Route::get('/admin/service-category/add', AdminAddServiceCategoryComponent::class)->name('admin.add_service_category');
    Route::get('/admin/service-category/edit/{category_id}', AdminEditServiceCategoryComponent::class)->name('admin.edit_service_category');
    Route::get('/admin/all-services', AdminServicesComponent::class)->name('admin.all_services');
    Route::get('/admin/{category_slug}/services', AdminServicesByCategoryComponent::class)->name('admin.services_by_category');
    Route::get('/admin//service/add', AdminAddServiceComponent::class)->name('admin.add_service');
    Route::get('/admin//service/edit/{service_slug}', AdminEditServiceComponent::class)->name('admin.edit_service');
});
