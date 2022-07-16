<?php

use App\Http\Livewire\HomeComponent;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\SearchController;
use App\Http\Livewire\ServiceDetailsComponent;
use App\Http\Livewire\Admin\AdminSliderComponent;
use App\Http\Livewire\ServiceCategoriesComponent;
use App\Http\Livewire\ServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminServicesComponent;
use App\Http\Livewire\Admin\AdminAddSliderComponent;
use App\Http\Livewire\Admin\AdminDashboardComponent;
use App\Http\Livewire\Admin\AdminAddServiceComponent;
use App\Http\Livewire\Admin\AdminEditSliderComponent;
use App\Http\Livewire\Admin\AdminEditServiceComponent;
use App\Http\Livewire\Provider\ProviderProfileComponent;
use App\Http\Livewire\Admin\AdminServiceCategoryComponent;
use App\Http\Livewire\Customer\CustomerDashboardComponent;
use App\Http\Livewire\Provider\ProviderDashboardComponent;
use App\Http\Livewire\Admin\AdminAddServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminContactComponent;
use App\Http\Livewire\Admin\AdminServicesByCategoryComponent;
use App\Http\Livewire\Admin\AdminEditServiceCategoryComponent;
use App\Http\Livewire\Admin\AdminServiceProvidersComponent;
use App\Http\Livewire\ContactComponent;
use App\Http\Livewire\Provider\EditProviderProfileComponent;

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

Route::get('/autocomplete', [SearchController::class, 'autocomplete'])->name('autocomplete');
Route::post('/search', [SearchController::class, 'searchServices'])->name('searchServices');
Route::get('/contact-us', ContactComponent::class)->name('home.contact');

//Customer
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::get('/customer/dashboard', CustomerDashboardComponent::class)->name('customer.dashboard');
});

//Provider
Route::middleware(['auth:sanctum', 'verified', 'authprovider'])->group(function () {
    Route::get('/provider/dashboard', ProviderDashboardComponent::class)->name('provider.dashboard');
    Route::get('/provider/profile', ProviderProfileComponent::class)->name('provider.profile');
    Route::get('/provider/profile/edit', EditProviderProfileComponent::class)->name('provider.edit_profile');
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

    Route::get('/admin/slider', AdminSliderComponent::class)->name('admin.slider');
    Route::get('/admin/slide/add', AdminAddSliderComponent::class)->name('admin.add_slide');
    Route::get('/admin/slide/edit/{slide_id}', AdminEditSliderComponent::class)->name('admin.edit_slide');
    Route::get('/admin/contacts', AdminContactComponent::class)->name('admin.contacts');

    Route::get('/admin/service-providers', AdminServiceProvidersComponent::class)->name('admin.service_providers');
});
