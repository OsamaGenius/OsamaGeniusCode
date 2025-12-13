<?php

namespace App\Livewire\Auth\Public;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Login extends Component
{

    #[Rule('required|email|max:255')]
    public $email;

    #[Rule('required|max:255')]
    public $password;

    public $remember = false;

    /*
    *========================================
    *========= Execute Login Logic ==========
    *========================================
    **/
    public function login () {
        $credentails = $this->validate();

        if( Auth::guard('web')->attempt($credentails, $this->remember) ) {
            session()->regenerate();
            return redirect()->to(route('homepage'));
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
        Auth::guard('web')->logout();

        session()->invalidate();

        session()->regenerateToken();

        return redirect()->route('homepage');
    }

    public function render()
    {
        return view('livewire.auth.public.login');
    }
}
