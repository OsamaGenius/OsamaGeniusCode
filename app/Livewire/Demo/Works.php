<?php

namespace App\Livewire\Demo;

use App\Models\Project;
use Livewire\Component;

class Works extends Component
{
    public function render()
    {
        return view(
            'livewire.demo.works',
            [
                'templates' => Project::where('category', 'Template')
                                    ->orderby('updated_at', 'DESC')
                                    ->limit(8)
                                    ->get(['id', 'image', 'title', 'category', 'price', 'project_url', 'updated_at']),
                'projects' => Project::where('category', 'Project')
                                    ->orderby('updated_at', 'DESC')
                                    ->limit(8)
                                    ->get(['id', 'image', 'title', 'category', 'price', 'project_url', 'updated_at']),
                'photoshop' => Project::where('category', 'Photoshop')
                                    ->orderby('updated_at', 'DESC')
                                    ->limit(8)
                                    ->get(['id', 'image', 'title', 'category', 'price', 'project_url', 'updated_at']),
            ]
        );
    }
}
