<?php

use App\Http\Middleware\PanelAuth;
use App\Livewire\Auth\Login;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Social;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::prefix('/admin')->group(function () {
    
    Route::get('/', function() {
        return view('panel.index');
    })->name('panel.login');
    
    Route::get('/reset', function() {
        return view('panel.auth.reset');
    })->name('panel.auth.reset');
    
    Route::get('/reset/new', function() {
        return view('panel.auth.new');
    })->name('panel.auth.new');
    
    Route::middleware(PanelAuth::class)->group(function () {
        
        Route::get('/logout', [Login::class, 'logout'])->name('panel.logout');
        
        Route::get('/dashboard', function() {
            if(!Auth::guard('panel')->user()) {
                return redirect()->route('panel.login');
            }
            return view(
                'panel.dashboard.index', 
                [
                    'users' => count(User::all()),
                    'projects' => count(Project::all()),
                    'skills' => count(Skill::all()),
                    'socials' => count(Social::all()),
                ]
            );
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

    });

});
