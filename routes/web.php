<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\VerificationController;
use App\Http\Controllers\Auth\ConfirmPasswordController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\TeamMemberController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\StoryController;
use App\Http\Controllers\Frontend\NewsletterController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Frontend\FrontendController;
use App\Http\Controllers\Admin\UploadController;


Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('frontend.home');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@about')->name('frontend.about');
// Route::get('/team', 'App\Http\Controllers\Frontend\FrontendController@team')->name('frontend.team');
Route::get('/events', 'App\Http\Controllers\Frontend\FrontendController@events')->name('frontend.events');
// Route::get('/detail-event', 'App\Http\Controllers\Frontend\FrontendController@singleEvent')->name('frontend.event.detail');
// Route::get('/gallery', 'App\Http\Controllers\Frontend\FrontendController@gallery')->name('frontend.gallery');

// Blogs
Route::get('/blogs', [FrontendController::class, 'blogs'])->name('frontend.blogs');
Route::get('/blogs/{slug}', [FrontendController::class, 'showBlog'])->name('blogs.show');

// Events
Route::get('/events', [FrontendController::class, 'events'])->name('frontend.events');
Route::get('/events/{id}', [FrontendController::class, 'showEvent'])->name('events.show');

// Stories
Route::get('/stories', [FrontendController::class, 'stories'])->name('frontend.stories');
Route::get('/stories/{slug}', [FrontendController::class, 'showStory'])->name('stories.show');

// Other pages
Route::get('/partners', [FrontendController::class, 'partners'])->name('frontend.partners');
Route::get('/team', [FrontendController::class, 'team'])->name('frontend.team');

// Gallery frontend routes
Route::get('/gallery', 'App\Http\Controllers\Frontend\GalleryController@index')->name('gallery.index');
Route::get('/gallery/{id}', 'App\Http\Controllers\Frontend\GalleryController@show')->name('gallery.show');
Route::get('/gallery/{id}/masonry', 'App\Http\Controllers\Frontend\GalleryController@masonry')->name('gallery.masonry');

// Featured gallery components
Route::get('/featured-gallery', 'App\Http\Controllers\Frontend\GalleryController@featured')->name('gallery.featured');
Route::get('/gallery-carousel/{eventId?}', 'App\Http\Controllers\Frontend\GalleryController@carousel')->name('gallery.carousel');

// Optional: Featured gallery for homepage
// Route::get('/featured-gallery', action: 'App\Http\Controllers\GalleryController@featured')->name('gallery.featured');
Route::get('/startright', function () {
    return view('frontend.pages.event.eventsdetails6');
})->name('frontend.startright');
Route::get('/edutor', function () {
    return view('frontend.pages.event.eventsdetails2');
})->name('frontend.edutor');
Route::get('/afrijam', function () {
    return view('frontend.pages.event.eventsdetails3');
})->name('frontend.afrijam');
Route::get('/industry-seminar', function () {
    return view('frontend.pages.event.event-single');
})->name('frontend.industry-seminar');
// Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* ======================== ADMIN ROUTES  ========================== */
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'index'])->name('dashboard');
    Route::resource('events', EventController::class);

    // Profile Routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::resource('users', UserController::class);
    Route::resource('partners', PartnerController::class);

    // Blogs Routes
    Route::resource('blogs', BlogController::class)
        ->names('blogs');

    //Stories
    Route::resource('stories', StoryController::class)
        ->names('stories');

    // Team Members Routes
    Route::resource('team', controller: TeamMemberController::class)->names('team');
    Route::post('team/update-order', [TeamMemberController::class, 'updateOrder'])->name('team.update-order');

    // Newsletter Routes
    Route::resource('newsletter', \App\Http\Controllers\Admin\NewsletterController::class)
        ->only(['index', 'destroy'])
        ->names('newsletter');

    // Gallery Routes
    Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
    Route::get('/gallery/event/{event}', [GalleryController::class, 'showEventGallery'])->name('gallery.event');
    Route::get('/gallery/event/{event}/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('/gallery/event/{event}', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('/gallery/image/{image}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('/gallery/image/{image}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('/gallery/image/{image}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
    Route::post('/gallery/update-order', [GalleryController::class, 'updateOrder'])->name('gallery.update-order');

    Route::post('/ckeditor-upload', [UploadController::class, 'upload'])->name('ckeditor.upload');

});


// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

// Password Reset Routes
Route::get('password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
Route::post('password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');

// Password Confirmation Routes
Route::get('password/confirm', [ConfirmPasswordController::class, 'showConfirmForm'])->name('password.confirm');
Route::post('password/confirm', [ConfirmPasswordController::class, 'confirm']);

// Email Verification Routes
Route::post('/newsletter/subscribe', [NewsletterController::class, 'subscribe'])
    ->name('newsletter.subscribe');

Route::get('/newsletter/confirm/{token}', [NewsletterController::class, 'confirm'])
    ->name('newsletter.confirm');

Route::get('/newsletter/unsubscribe/{token}', [NewsletterController::class, 'unsubscribe'])
    ->name('newsletter.unsubscribe');
