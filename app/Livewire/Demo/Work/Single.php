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

        # Getting the selected project data
        $project = Project::where('id', $this->project_id)->get();

        # Getting similar projects data
        $projects = Project::where('category', $project[0]->category)
                            ->where('id', '!=', $project[0]->id)
                            ->orderby('updated_at', 'DESC')
                            ->limit(8)
                            ->get();

        return view(
            'livewire.demo.work.single',
            [
                'project' => $project,
                'projects' => $projects,
            ]
        );
    }
}
