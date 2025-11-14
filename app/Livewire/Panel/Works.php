<?php

namespace App\Livewire\Panel;

use App\Models\Project;
use Livewire\Component;

class Works extends Component
{

    /*
    *===============
    *== Variables ==
    *===============
    **/ 
    public  $project_id = '', 
            $title = '',
            $category = '', 
            $payment = 'Free',
            $price = '',
            $tech_stack = '',
            $project_url = '',
            $repo_url = '',
            $vedio = '',
            $description = '',
            $preview = '';
    
    protected $rules = [
        # code...
    ];

    /*
    *=================================================================
    *== Filling the edit form when press edit icon in project table ==
    *=================================================================
    **/ 
    public function setProjectID($id)
    {
        # code...
    }

    /*
    *==================================================
    *== Canceling editing process and reset the form ==
    *==================================================
    **/ 
    public function cancel()
    {
        # code...
    }

    /*
    *==========================================
    *== Saving new projects data to database ==
    *==========================================
    **/ 
    public function save()
    {
        # code...
    }

    /*
    *================================================
    *== Updating old projects data inside database ==
    *================================================
    **/ 
    public function update()
    {
        # code...
    }

    /*
    *==========================================
    *== Deleting projects data from database ==
    *==========================================
    **/ 
    public function delete()
    {
        # code...
    }

    /*
    *=====================================================
    *== Rendering and shown the project management page ==
    *=====================================================
    **/ 
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
