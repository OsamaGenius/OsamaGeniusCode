<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\traits\Dispatching;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class PubInfo extends Component
{
    use Dispatching;

    public $guard;

    #[Rule('required|string|max:255|unique:'.User::class)]
    public $name;

    #[Rule('nullable|string|max:255')]
    public $bio;

    public function mount($guard) {
        $this->guard = $guard;
        $this->name = Auth::guard($this->guard)->user()->name;
        $this->bio = Auth::guard($this->guard)->user()->bio;
        Dispatching::notAdminsAuth();
    }

    public function update()
    {
        $validation = $this->validate([
            'name' => 'required|string|max:255|unique:' . User::class . ',name,' . Auth::guard($this->guard)->user()->id,
            'bio' => 'nullable|string|max:255'
        ]);

        User::where('id', Auth::guard($this->guard)->user()->id)->update([
            'name' => $validation['name'],
            'bio' => $validation['bio'],
        ]);

        $this->dispatchingMsgs('Successfully updated personal details');

    }

    public function render()
    {
        return view('livewire.profile.pub-info');
    }
}
