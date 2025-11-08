<?php

namespace App\Livewire\Demo;

use App\Models\Social as ModelsSocial;
use Livewire\Attributes\On;
use Livewire\Component;

class Social extends Component
{
    // protected $listeners = ['update-view', '$refresh'];

    #[On('update-view')]
    public function render()
    {
        return view(
            'livewire.demo.social',
            [
                'links' => ModelsSocial::all(['name', 'url'])
            ]
        );
    }
}
