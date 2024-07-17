<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|   
*/

Route::get('/', function () {
    return view('client.pages.home');
});

Route::get('/movie-list', function() {
    return view('client.pages.movie-list');
});

Route::get('/movie-detail', function() {
    return view('client.pages.movie-detail');
});

Route::get('/movie-ticket-plan', function() {
    return view('client.pages.movie-ticket-plan');
});

Route::get('/movie-seat-plan', function() {
    return view('client.pages.movie-seat-plan');
});

Route::get('/movie-checkout', function() {
    return view('client.pages.movie-checkout');
});

Route::get('/movie-food', function() {
    return view('client.pages.movie-food');
});

Route::get('/404', function() {
    return view('client.pages.404');
});

Route::get('/about-us', function() {
    return view('client.pages.about-us');
});

Route::get('/sign-in', function() {
    return view('client.auth.login');
});

Route::get('/sign-up', function() {
    return view('client.auth.sign-up');
});

Route::get('/blog', function() {
    return view('client.pages.blog');
});

Route::get('/blog-single', function() {
    return view('client.pages.blog-single');
});

Route::get('/contact-us', function() {
    return view('client.pages.contact-us');
});