<?php

namespace App\Livewire\Demo;

use App\Models\Info;
use Livewire\Component;

class Story extends Component
{
    public function render()
    {
        return view(
            'livewire.demo.story',
            [
                'stories' => Info::where('type', 'story')->orderby('updated_at', 'desc')->limit('4')->get(['title', 'updated_at'])
            ]
        );
    }
}
