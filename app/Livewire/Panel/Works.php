<?php

namespace App\Livewire\Panel;

use App\Models\Project;
use Livewire\Component;

class Works extends Component
{

    public $payment = 'Free';

    public function render()
    {
        return view(
            'livewire.panel.works',
            [
                'works' => Project::all()
            ]
        );
    }
}
