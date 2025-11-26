<?php

namespace App\Livewire\Demo;

use App\Models\Project;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;

class Works extends Component
{

    use WithPagination;

    // Varients
    public $search;
    public $category;
    public $searchResult;
    public $cateResult;
    public $result = false;

    public function render()
    {

        // Search Operation
        if ($this->search !== '' && Str::length($this->search) > 0) {
            $this->result = true;
            $this->searchResult = Project::where('title', 'like', '%' . $this->search . '%')
                ->orWhere('category', 'like', '%' . $this->search . '%')
                ->get(['id', 'title', 'price', 'updated_at']);
        } else {
            $this->result = false;
            $this->reset(['searchResult']);
        }

        // Category Filter
        if ($this->category !== '') {
            switch ($this->category) {
                case 'Template':
                    $this->cateResult = Project::where('category', 'template')->orderby('updated_at', 'desc')->get();
                    break;
                case 'Project':
                    $this->cateResult = Project::where('category', 'project')->orderby('updated_at', 'desc')->get();
                    break;
                case 'photoshop':
                    $this->cateResult = Project::where('category', 'photoshop')->orderby('updated_at', 'desc')->get();
                    break;
                default:
                    $this->cateResult = Project::orderby('updated_at', 'desc')->get();
                    break;
            }
        } else {
            # Code...
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
