<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'App\Http\Controllers\Frontend\FrontendController@index')->name('frontend.home');
Route::get('/about', 'App\Http\Controllers\Frontend\FrontendController@about')->name('frontend.about');
Route::get('/team', 'App\Http\Controllers\Frontend\FrontendController@team')->name('frontend.team');
Route::get('/events', 'App\Http\Controllers\Frontend\FrontendController@events')->name('frontend.events');
Route::get('/detail-event', 'App\Http\Controllers\Frontend\FrontendController@singleEvent')->name('frontend.event.detail');
Route::get('/gallery', 'App\Http\Controllers\Frontend\FrontendController@gallery')->name('frontend.gallery');


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