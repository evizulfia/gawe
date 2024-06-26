<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\LoginController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/submit', [ContactController::class, 'submit'])->name('contact_submit');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('login', [LoginController::class, 'index'])->name('login');



Route::get('/dashboard', [WebsiteController::class, 'dashboard'])->name('dashboard')->middleware('auth');

Route::get('/login', [WebsiteController::class, 'login'])->name('login');
Route::post('/login-submit', [WebsiteController::class, 'login_submit'])->name('login_submit');

Route::get('/logout', [WebsiteController::class, 'logout'])->name('logout');

Route::get('/registration', [WebsiteController::class, 'registration'])->name('registration');
Route::post('/registration_submit', [WebsiteController::class, 'registration_submit'])->name('registration_submit');

Route::get('/registration/verify/{token}/{email}', [WebsiteController::class, 'registration_verify']);

Route::get('/forget-password', [WebsiteController::class, 'forget_password'])->name('forget_password');
Route::post('/forget_password_submit', [WebsiteController::class, 'forget_password_submit'])->name('forget_password_submit');

Route::get('/reset-password/{token}/{email}', [WebsiteController::class, 'reset_password'])->name('reset_password');
Route::post('/reset_password_submit', [WebsiteController::class, 'reset_password_submit'])->name('reset_password_submit');

/* Admin */

Route::get('/admin/login', [AdminLoginController::class, 'index'])->name('admin_login');
Route::post('/admin/login-submit', [AdminLoginController::class, 'login_submit'])->name('admin_login_submit');
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin_logout');
Route::get('/admin/forget-password', [AdminLoginController::class, 'forget_password'])->name('admin_forget_password');
Route::post('/admin/forget-password-submit', [AdminLoginController::class, 'forget_password_submit'])->name('admin_forget_password_submit');
Route::get('/admin/reset-password/{token}/{email}', [AdminLoginController::class, 'reset_password'])->name('admin_reset_password');
Route::post('/admin/reset-password-submit', [AdminLoginController::class, 'reset_password_submit'])->name('admin_reset_password_submit');

Route::middleware('admin:admin')->group(function (){
    Route::get('/admin/home', [AdminHomeController::class, 'index'])->name('admin_home');
    Route::get('/admin/home-page', [AdminHomePageController::class, 'index'])->name('admin_home_page');
    Route::get('/admin/edit-profile', [AdminProfileController::class, 'index'])->name('admin_profile');
    Route::post('/admin/edit-profile-submit', [AdminProfileController::class, 'profile_submit'])->name('admin_profile_submit');
    Route::post('/admin/home-page/update', [AdminHomePageController::class, 'update'])->name('admin_home_page_update');
    Route::get('/admin/job-category', [AdminJobCategoryController::class, 'index'])->name('admin_job_category');
});


use Illuminate\Support\Facades\DB;

Route::get('/current-database', function () {
    $databaseName = DB::connection()->getDatabaseName();
    return 'Current database is: ' . $databaseName;
});


