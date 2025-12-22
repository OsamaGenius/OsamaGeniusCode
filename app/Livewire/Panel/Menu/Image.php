<?php

namespace App\Livewire\Panel\Menu;

use Livewire\Attributes\On;
use Livewire\Component;

class Image extends Component
{
    #[On('reload-image')]
    public function render()
    {
        return view('livewire.panel.menu.image');
    }
}
