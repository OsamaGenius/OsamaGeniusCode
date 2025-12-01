<?php

namespace App\Livewire\Demo;

use App\Models\Info;
use Livewire\Component;

class About extends Component
{

    public $about;

    public function render()
    {

        $converter = app(\League\CommonMark\CommonMarkConverter::class);
        
        $data = Info::where('type', 'About')->orderby('created_at', 'ASC')->first(['title']);
        
        if ($data) 
        {
            $this->about = (string) $converter->convert($data->title);
        } 
        else 
        {
            $this->reset('about');
        }
    
        return view(
            'livewire.demo.about',
        );
    }
}
