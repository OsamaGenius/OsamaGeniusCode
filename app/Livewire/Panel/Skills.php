<?php

namespace App\Livewire\Panel;

use App\Models\Skill;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Skills extends Component
{

    use WithPagination;

    /**
     * ===================================================
     * == Defining Variable and bind them with template ==
     * ===================================================
     * */
    public $search = '';

    public $id = '';

    public $name = '';

    public $percentage = '';

    public $level = 'Intermediate';

    protected $rules = [
        'name' => ['required', 'string', 'max:225', 'unique:'.Skill::class],
        'percentage' => ['required', 'integer'],
        'level' => ['required', 'string', 'max:255']
    ];
    
    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    public function resetInputs()
    {
        $this->reset(['search', 'id', 'name', 'percentage', 'level']);
    }

    /**
     * ========================
     * == Dispatching Events ==
     * ========================
     * */
    protected function dispatchingMsgs($message,  $type = 'success', $event = 'show-alert')
    {
        $this->dispatch(
            $event, 
            [
                'message' => $message,
                'type' => $type,
            ]
        );
    }

    /**
     * =========================================
     * == Store new skills data into database ==
     * =========================================
     * */
    public function save()
    {
        // Validate from data entered by the users
        $validation = $this->validate();

        // Save data after passed validation to database
        Skill::create([
            'name' => $validation['name'],
            'level' => $validation['level'],
            'percentage' => $validation['percentage'],
            // 'user_id' => Auth::guard('panel')->user()->id,
            'user_id' => '1',
        ]);

        // Show success message
        $this->dispatchingMsgs('Successfully added new skills data');

        // Reset form feilds
        $this->resetInputs();

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
