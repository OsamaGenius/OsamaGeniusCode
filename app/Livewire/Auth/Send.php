<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\Rule;
use Livewire\Component;
use App\traits\Dispatching;
use Illuminate\Support\Facades\DB;

class Send extends Component
{

    use Dispatching;

    public $show = true;

    #[Rule('required|email|max:255')]
    public $email;

    #[Rule('required|integer|max:255')]
    public $code;

    /*
    *=======================================================
    *===== Sending the verification code to target email ===
    *=======================================================
    **/ 
    public function sendCode()
    {
        $this->validate();

        DB::insert('insert into password_reset_tokens (email, token) values (?, ?)', [$this->email, rand(100000, 999999)]);

        $this->show = true;

        $this->dispatchingMsgs('Successfully sended verification code to your email');

        $this->resetInputs('email');
    }

    /*
    *=======================================
    *===== Confirm the verification code ===
    *=======================================
    **/ 
    public function confirmCode()
    {
        $this->show = true;
    }

    public function render()
    {
        return view('livewire.auth.send');
    }
}
