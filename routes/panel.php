<?php

use App\Http\Middleware\PanelAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    
    Route::get('/', function() {
        return view('panel.index');
    })->name('panel.login');
    
    // Route::middleware(PanelAuth::class)->group(function () {
        
        Route::get('/dashboard', function() {
            return view('panel.dashboard.index');
        })->name('dashboard');
        
        Route::get('/users', function() {
            return view('panel.users.index');
        })->name('users');
        
        Route::get('/about', function() {
            return view('panel.about.index');
        })->name('panel.about');
        
        Route::get('/works', function() {
            return view('panel.works.index');
        })->name('panel.works');
        
        Route::get('/skills', function() {
            return view('panel.skills.index');
        })->name('panel.skills');
        
        Route::get('/socials', function() {
            return view('panel.social.index');
        })->name('panel.socials');

    // });

});
