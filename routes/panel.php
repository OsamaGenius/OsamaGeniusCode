<?php

use App\Http\Middleware\PanelAuth;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    
    Route::get('/', function() {
        return view('panel.index');
    })->name('panel.login');
    
    // Route::middleware(PanelAuth::class)->group(function () {
        
        Route::get('/socials', function() {
            return view('panel.social.index');
        })->name('panel.socials');
        
        Route::get('/skills', function() {
            return view('panel.skills.index');
        })->name('panel.skills');

    // });

});
