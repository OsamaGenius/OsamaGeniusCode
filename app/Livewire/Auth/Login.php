<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\Attributes\Rule;

class Login extends Component
{

    #[Rule('required|email|max:255')]
    public $email;

    #[Rule('required|string|min:8|max:255')]
    public $password;

    public $remember = false;

    /*
    *========================================
    *========= Execute Login Logic ==========
    *========================================
    **/
    public function login()
    {
        $credentials = $this->validate();

        if (Auth::guard('panel')->attempt($credentials, $this->remember)) {
            session()->regenerate();
            return redirect()->to(route('dashboard'));
        }

        $this->addError('email', 'The provided credentials not matched our records');
    }

    /*
    *=========================================
    *========= Execute Logout Logic ==========
    *=========================================
    **/
    public function logout()
    {
        Auth::guard('panel')->logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route('panel.login');
    }

    /*
    *================================================================
    *========= Redirect if Authenticated User to Dashboard ==========
    *================================================================
    **/
    public function mount() {
        if( Auth::guard('panel')->user() ) {
            return redirect()->route('dashboard');
        }
    }

    /*
    *===========================================
    *========= Render Login Form Page ==========
    *===========================================
    **/
    public function render()
    {
        return view('livewire.auth.login');
    }
}
