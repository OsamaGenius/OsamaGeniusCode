<?php

namespace App\Livewire\Panel;

use App\Models\Skill;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Skills extends Component
{

    /**
     * ===================================================
     * == Defining Variable and bind them with template ==
     * ===================================================
     * */
    #[Rule('string|max:255')]
    public $search = '';

    #[Rule('required|string|max:255')]
    public $id = '';

    #[Rule('required|string|max:255|unique:'.Skill::class)]
    public $name = '';

    #[Rule('required|number')]
    public $percentage = '';

    #[Rule('required|string|max:255')]
    public $level = 'Intermediate';
    
    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    public function resetInputs()
    {
        $this->reset(['search', 'id', 'name', 'percentage', 'level']);
    }

    public function render()
    {

        $skills = Skill::paginate(5);

        return view(
            'livewire.panel.skills',
            ['skills' => $skills]
        );
    }
}
