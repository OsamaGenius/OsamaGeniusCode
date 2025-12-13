<?php

namespace App\Livewire\Auth\Public;

use App\Models\User;
use App\traits\Dispatching;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Register extends Component
{

    use Dispatching;

    #[Rule('required|string|max:255')]
    public $name;

    #[Rule('required|email|max:255|unique:' . User::class)]
    public $email;

    #[Rule('required|string|max:255|min:8|max:20')]
    public $password;

    public function registerNewUser()
    {
        $validation = $this->validate();

        User::create($validation);

        // session()->regenerate();

        $this->dispatchingMsgs('Successfully created your account');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.auth.public.register');
    }
}
