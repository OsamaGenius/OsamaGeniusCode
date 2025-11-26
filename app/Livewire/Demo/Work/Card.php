<?php

namespace App\Livewire\Demo\Work;

use Livewire\Component;

class Card extends Component
{

    public $projects;

    public function render()
    {
        return view('livewire.demo.work.card');
    }
}
