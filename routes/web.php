<?php

use App\Livewire\Auth\Public\Login;
use App\Livewire\Demo\Work\Single;
use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function () {

    Route::get('/', function () {
        return view('demo.index');
    })->name('homepage');

    Route::get('/about', function () {
        return view('demo.about');
    })->name('about');

    Route::get('/works', function () {
        return view('demo.works.index');
    })->name('works');
    
    Route::get('/works/{project_id}/details', Single::class)->name('works.single');
    
    Route::get('/login', function () {
        return view('demo.login');
    })->name('login');
    
    Route::get('/logout', [Login::class, 'logout'])->name('logout');
    
    Route::get('/register', function () {
        return view('demo.register');
    })->name('register');
    
});
