<?php

namespace App\Livewire\Demo;

use App\Models\Skill;
use Livewire\Component;

class Skills extends Component
{
    public function render()
    {
        return view(
            'livewire.demo.skills',
            [
                'fLinks' => Skill::where('type', 'Frontend')->get(['name', 'percentage']),
                'bLinks' => Skill::where('type', 'Backend')->get(['name', 'percentage']),
            ]
        );
    }
}
