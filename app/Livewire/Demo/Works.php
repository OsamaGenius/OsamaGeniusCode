<?php

namespace App\Livewire\Demo;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;

class Works extends Component
{

    // Varients
    public $search;
    public $searchResult;
    public $result = false;

    public function render()
    {

        // Search Operation
        if ($this->search !== '' && Str::length($this->search) > 0) {
            $this->result = true;
            $this->searchResult = Project::where('title', 'like', '%'.$this->search.'%')
                                        ->orWhere('category', 'like', '%'.$this->search.'%')
                                        ->get(['id', 'title', 'price', 'updated_at']);
        } else {
            $this->result = false;
        }

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
