<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\Front\TermsController;
use App\Http\Controllers\Front\HomeController;
use App\Http\Controllers\Front\BlogController;
use App\Http\Controllers\Front\SignupController;
use App\Http\Controllers\Front\ForgetPasswordController;
use App\Http\Controllers\Front\JobListingController;
use App\Http\Controllers\Front\CompanyListingController;
use App\Http\Controllers\Front\ContactController;
use App\Http\Controllers\Front\FaqController;
use App\Http\Controllers\Front\LoginController;

use App\Http\Controllers\Admin\AdminHomeController;
use App\Http\Controllers\Admin\AdminHomePageController;
use App\Http\Controllers\Admin\AdminLoginController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\AdminJobCategoryController;
use App\Http\Controllers\Admin\AdminOtherPageController;

use App\Http\Controllers\Candidate\CandidateController;

use App\Http\Controllers\Company\CompanyController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/', [WebsiteController::class, 'index'])->name('home');
Route::get('/terms', [TermsController::class, 'index'])->name('terms');
Route::get('/blog', [BlogController::class, 'index'])->name('blog');
Route::get('contact', [ContactController::class, 'index'])->name('contact');
Route::post('contact/submit', [ContactController::class, 'submit'])->name('contact_submit');
Route::get('faq', [FaqController::class, 'index'])->name('faq');
Route::get('login', [LoginController::class, 'index'])->name('login');
Route::get('create-account', [SignupController::class, 'index'])->name('signup');


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
Route::get('job-listing', [JobListingController::class, 'index'])->name('job_listing');
Route::get('job-detail/{id}', [JobListingController::class, 'detail'])->name('job');
Route::post('job-enquery/email', [JobListingController::class, 'send_email'])->name('job_enquery_send_email');

Route::get('company-listing', [CompanyListingController::class, 'index'])->name('company_listing');
Route::get('company-detail/{id}', [CompanyListingController::class, 'detail'])->name('company');
Route::post('company-enquery/email', [CompanyListingController::class, 'send_email'])->name('company_enquery_send_email');
Route::get('create-account', [SignupController::class, 'index'])->name('signup');

/*Company */
Route::get('forget-password/company', [ForgetPasswordController::class, 'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit', [ForgetPasswordController::class, 'company_forget_password_submit'])->name('company_forget_password_submit');
Route::get('reset-password/company/{token}/{email}', [ForgetPasswordController::class, 'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgetPasswordController::class, 'company_reset_password_submit'])->name('company_reset_password_submit');

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
    Route::get('/admin/other-page', [AdminOtherPageController::class, 'index'])->name('admin_other_page');
});


/* Company */
Route::post('company_login_submit', [LoginController::class, 'company_login_submit'])->name('company_login_submit');
Route::post('company_signup_submit', [SignupController::class, 'company_signup_submit'])->name('company_signup_submit');
Route::get('company_signup_verify/{token}/{email}', [SignupController::class, 'company_signup_verify'])->name('company_signup_verify');
Route::get('/company/logout', [LoginController::class, 'company_logout'])->name('company_logout');
Route::get('forget-password/company', [ForgetPasswordController::class, 'company_forget_password'])->name('company_forget_password');
Route::post('forget-password/company/submit', [ForgetPasswordController::class, 'company_forget_password_submit'])->name('company_forget_password_submit');
Route::get('reset-password/company/{token}/{email}', [ForgetPasswordController::class, 'company_reset_password'])->name('company_reset_password');
Route::post('reset-password/company/submit', [ForgetPasswordController::class, 'company_reset_password_submit'])->name('company_reset_password_submit');


/* Company Middleware */
Route::middleware(['company:company'])->group(function() {
    Route::get('/company/dashboard', [CompanyController::class, 'dashboard'])->name('company_dashboard');
    Route::get('/company/make-payment', [CompanyController::class, 'make_payment'])->name('company_make_payment');
    Route::get('/company/orders', [CompanyController::class, 'orders'])->name('company_orders');

    Route::post('/company/paypal/payment', [CompanyController::class, 'paypal'])->name('company_paypal');
    Route::get('/company/paypal/success', [CompanyController::class, 'paypal_success'])->name('company_paypal_success');
    Route::get('/company/paypal/cancel', [CompanyController::class, 'paypal_cancel'])->name('company_paypal_cancel');

    Route::post('/company/stripe/payment', [CompanyController::class, 'stripe'])->name('company_stripe');
    Route::get('/company/stripe/success', [CompanyController::class, 'stripe_success'])->name('company_stripe_success');
    Route::get('/company/stripe/cancel', [CompanyController::class, 'stripe_cancel'])->name('company_stripe_cancel');

    Route::get('/company/edit-profile', [CompanyController::class, 'edit_profile'])->name('company_edit_profile');
    Route::post('/company/edit-profile/update', [CompanyController::class, 'edit_profile_update'])->name('company_edit_profile_update');

    Route::get('/company/edit-password', [CompanyController::class, 'edit_password'])->name('company_edit_password');
    Route::post('/company/edit-password/update', [CompanyController::class, 'edit_password_update'])->name('company_edit_password_update');

    Route::get('/company/photos', [CompanyController::class, 'photos'])->name('company_photos');
    Route::post('/company/photos/submit', [CompanyController::class, 'photos_submit'])->name('company_photos_submit');
    Route::get('/company/photos/delete/{id}', [CompanyController::class, 'photos_delete'])->name('company_photos_delete');

    Route::get('/company/videos', [CompanyController::class, 'videos'])->name('company_videos');
    Route::post('/company/videos/submit', [CompanyController::class, 'videos_submit'])->name('company_videos_submit');
    Route::get('/company/videos/delete/{id}', [CompanyController::class, 'videos_delete'])->name('company_videos_delete');

    Route::get('/company/create-job', [CompanyController::class, 'jobs_create'])->name('company_jobs_create');
    Route::post('/company/create-job-submit', [CompanyController::class, 'jobs_create_submit'])->name('company_jobs_create_submit');

    Route::get('/company/jobs', [CompanyController::class, 'jobs'])->name('company_jobs');
    Route::get('/company/job-edit/{id}', [CompanyController::class, 'jobs_edit'])->name('company_jobs_edit');
    Route::post('/company/job-update/{id}', [CompanyController::class, 'jobs_update'])->name('company_jobs_update');
    Route::get('/company/job-delete/{id}', [CompanyController::class, 'jobs_delete'])->name('company_jobs_delete');

    Route::get('/company/candidate-applications', [CompanyController::class, 'candidate_applications'])->name('company_candidate_applications');
    Route::get('/company/applicants/{id}', [CompanyController::class, 'applicants'])->name('company_applicants');
    Route::get('/company/applicant-resume/{id}', [CompanyController::class, 'applicant_resume'])->name('company_applicant_resume');
    Route::post('/company/application-status-change', [CompanyController::class, 'application_status_change'])->name('company_application_status_change');


});


/* Candidate */
Route::post('candidate_login_submit', [LoginController::class, 'candidate_login_submit'])->name('candidate_login_submit');
Route::post('candidate_signup_submit', [SignupController::class, 'candidate_signup_submit'])->name('candidate_signup_submit');
Route::get('candidate_signup_verify/{token}/{email}', [SignupController::class, 'candidate_signup_verify'])->name('candidate_signup_verify');
Route::get('/candidate/logout', [LoginController::class, 'candidate_logout'])->name('candidate_logout');
Route::get('forget-password/candidate', [ForgetPasswordController::class, 'candidate_forget_password'])->name('candidate_forget_password');
Route::post('forget-password/candidate/submit', [ForgetPasswordController::class, 'candidate_forget_password_submit'])->name('candidate_forget_password_submit');
Route::get('reset-password/candidate/{token}/{email}', [ForgetPasswordController::class, 'candidate_reset_password'])->name('candidate_reset_password');
Route::post('reset-password/candidate/submit', [ForgetPasswordController::class, 'candidate_reset_password_submit'])->name('candidate_reset_password_submit');

/* Candidate Middleware */
Route::middleware(['candidate:candidate'])->group(function() {
    Route::get('/candidate/dashboard', [CandidateController::class, 'dashboard'])->name('candidate_dashboard');
    Route::get('/candidate/edit-profile', [CandidateController::class, 'edit_profile'])->name('candidate_edit_profile');
    Route::post('/candidate/edit-profile/update', [CandidateController::class, 'edit_profile_update'])->name('candidate_edit_profile_update');
    Route::get('/candidate/edit-password', [CandidateController::class, 'edit_password'])->name('candidate_edit_password');
    Route::post('/candidate/edit-password/update', [CandidateController::class, 'edit_password_update'])->name('candidate_edit_password_update');

    Route::get('/candidate/education/view', [CandidateController::class, 'education'])->name('candidate_education');
    Route::get('/candidate/education/create', [CandidateController::class, 'education_create'])->name('candidate_education_create');
    Route::post('/candidate/education/store', [CandidateController::class, 'education_store'])->name('candidate_education_store');
    Route::get('/candidate/education/edit/{id}', [CandidateController::class, 'education_edit'])->name('candidate_education_edit');
    Route::post('/candidate/education/update/{id}', [CandidateController::class, 'education_update'])->name('candidate_education_update');
    Route::get('/candidate/education/delete/{id}', [CandidateController::class, 'education_delete'])->name('candidate_education_delete');

    Route::get('/candidate/skill/view', [CandidateController::class, 'skill'])->name('candidate_skill');
    Route::get('/candidate/skill/create', [CandidateController::class, 'skill_create'])->name('candidate_skill_create');
    Route::post('/candidate/skill/store', [CandidateController::class, 'skill_store'])->name('candidate_skill_store');
    Route::get('/candidate/skill/edit/{id}', [CandidateController::class, 'skill_edit'])->name('candidate_skill_edit');
    Route::post('/candidate/skill/update/{id}', [CandidateController::class, 'skill_update'])->name('candidate_skill_update');
    Route::get('/candidate/skill/delete/{id}', [CandidateController::class, 'skill_delete'])->name('candidate_skill_delete');

    Route::get('/candidate/experience/view', [CandidateController::class, 'experience'])->name('candidate_experience');
    Route::get('/candidate/experience/create', [CandidateController::class, 'experience_create'])->name('candidate_experience_create');
    Route::post('/candidate/experience/store', [CandidateController::class, 'experience_store'])->name('candidate_experience_store');
    Route::get('/candidate/experience/edit/{id}', [CandidateController::class, 'experience_edit'])->name('candidate_experience_edit');
    Route::post('/candidate/experience/update/{id}', [CandidateController::class, 'experience_update'])->name('candidate_experience_update');
    Route::get('/candidate/experience/delete/{id}', [CandidateController::class, 'experience_delete'])->name('candidate_experience_delete');

    Route::get('/candidate/award/view', [CandidateController::class, 'award'])->name('candidate_award');
    Route::get('/candidate/award/create', [CandidateController::class, 'award_create'])->name('candidate_award_create');
    Route::post('/candidate/award/store', [CandidateController::class, 'award_store'])->name('candidate_award_store');
    Route::get('/candidate/award/edit/{id}', [CandidateController::class, 'award_edit'])->name('candidate_award_edit');
    Route::post('/candidate/award/update/{id}', [CandidateController::class, 'award_update'])->name('candidate_award_update');
    Route::get('/candidate/award/delete/{id}', [CandidateController::class, 'award_delete'])->name('candidate_award_delete');

    Route::get('/candidate/resume/view', [CandidateController::class, 'resume'])->name('candidate_resume');
    Route::get('/candidate/resume/create', [CandidateController::class, 'resume_create'])->name('candidate_resume_create');
    Route::post('/candidate/resume/store', [CandidateController::class, 'resume_store'])->name('candidate_resume_store');
    Route::get('/candidate/resume/edit/{id}', [CandidateController::class, 'resume_edit'])->name('candidate_resume_edit');
    Route::post('/candidate/resume/update/{id}', [CandidateController::class, 'resume_update'])->name('candidate_resume_update');
    Route::get('/candidate/resume/delete/{id}', [CandidateController::class, 'resume_delete'])->name('candidate_resume_delete');


    Route::get('/candidate/bookmark-add/{id}', [CandidateController::class, 'bookmark_add'])->name('candidate_bookmark_add');
    Route::get('/candidate/bookmark-view', [CandidateController::class, 'bookmark_view'])->name('candidate_bookmark_view');
    Route::get('/candidate/bookmark-delete/{id}', [CandidateController::class, 'bookmark_delete'])->name('candidate_bookmark_delete');

    Route::get('/candidate/apply/{id}', [CandidateController::class, 'apply'])->name('candidate_apply');
    Route::post('/candidate/apply-submit/{id}', [CandidateController::class, 'apply_submit'])->name('candidate_apply_submit');
    Route::get('/candidate/applications', [CandidateController::class, 'applications'])->name('candidate_applications');

});













use Illuminate\Support\Facades\DB;

Route::get('/current-database', function () {
    $databaseName = DB::connection()->getDatabaseName();
    return 'Current database is: ' . $databaseName;
});


