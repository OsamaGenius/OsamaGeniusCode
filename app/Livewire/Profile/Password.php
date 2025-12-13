<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\traits\Dispatching;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Password extends Component
{

    use Dispatching;

    public $guard;

    #[Rule('required|string|min:8|max:20|confirmed:password_confirm')]
    public $password;
    
    #[Rule('required|string|min:8|max:20')]
    public $password_confirm;
    
    public function mount($guard)
    {
        $this->guard = $guard;
        Dispatching::notAdminsAuth();
    }

    public function update()
    {
        $validation = $this->validate();

        User::where('id', Auth::guard($this->guard)->user()->id)->update([
            'password' => Hash::make($validation['password'])
        ]);

        $this->dispatchingMsgs('Successfully updating the password');

        $this->resetInputs(['password', 'password_confirm']);

    }

    public function render()
    {
        return view('livewire.profile.password');
    }
}
