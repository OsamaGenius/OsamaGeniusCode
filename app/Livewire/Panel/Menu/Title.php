<?php

namespace App\Livewire\Panel\Menu;

use Livewire\Attributes\On;
use Livewire\Component;

class Title extends Component
{
    #[On('reload-info')]
    public function render()
    {
        return view('livewire.panel.menu.title');
    }
}
