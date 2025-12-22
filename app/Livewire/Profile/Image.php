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

    public $path;

    #[Rule('required|image|max:1024')]
    public $image;
    
    /*
    *==========================================
    *======== Updating the user image =========
    *==========================================
    **/
    public function update() {
        $this->validate();

        if($this->image) {
            $this->path = $this->image->store('Profiles', 'public');
        } else {
            $this->path = Auth::guard('panel')->user()->image;
        }

        User::where('id', Auth::guard('panel')->user()->id)->update([
            'image' => $this->path
        ]);

        $this->dispatchingMsgs('Successfully updated your profile image');

        $this->resetInputs('image');

        $this->dispatch('reload-image');
    }

    /*
    *=====================================
    *======== Mount data to view =========
    *=====================================
    **/
    public function mount($guard) {
        $this->guard = $guard;
        $this->path = Auth::guard('panel')->user()->image;
        Dispatching::notAdminsAuth();
    }

    /*
    *=====================================
    *======== Rendering the view =========
    *=====================================
    **/
    public function render()
    {
        return view(
            'livewire.profile.image',
            [
                'path' => $this->path
            ]
        );
    }
}
