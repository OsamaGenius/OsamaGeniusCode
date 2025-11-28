<?php

namespace App\Livewire\Demo\Work;

use App\Models\Project;
use Livewire\Attributes\Layout;
use Livewire\Component;

class Single extends Component
{
    public $project_id;

    // #[Layout('layouts.app')]
    public function render()
    {
        return view(
            'livewire.demo.work.single',
            ['project' => Project::where('id', $this->project_id)->get()]
        );
    }
}
