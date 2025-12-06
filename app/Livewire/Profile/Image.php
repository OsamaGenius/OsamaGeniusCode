<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\traits\Dispatching;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithFileUploads;

class Image extends Component
{
    use Dispatching, WithFileUploads;

    public $guard;

    #[Rule('required|image|max:1024')]
    public $image;
    
    /*
    *==========================================
    *======== Updating the user image =========
    *==========================================
    **/
    public function update() {
        $validation = $this->validate();

        if($this->image) {
         
            $validition['image'] = $this->image->store('Profiles', 'public');
        
        }

        User::where('id', Auth::guard('panel')->user()->id)->update($validation);

        $this->dispatchingMsgs('Successfully updated your profile image');

        $this->resetInputs('image');
    }

    /*
    *=====================================
    *======== Mount data to view =========
    *=====================================
    **/
    public function mount($guard) {
        $this->guard = $guard;
        Dispatching::notAdminsAuth();
    }

    /*
    *=====================================
    *======== Rendering the view =========
    *=====================================
    **/
    public function render()
    {
        return view('livewire.profile.image');
    }
}
