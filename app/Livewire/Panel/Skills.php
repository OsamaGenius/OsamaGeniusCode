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

    public $skill_id = '';

    public $name = '';

    public $percentage = '';

    public $level = 'Intermediate';

    public $type = 'Frontend';

    protected $rules = [
        'percentage' => ['required', 'integer'],
        'type' => ['required', 'string', 'max:255'],
        'level' => ['required', 'string', 'max:255'],
        'name' => ['required', 'string', 'max:225', 'unique:'.Skill::class],
    ];
    
    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    public function resetInputs()
    {
        $this->reset(['search', 'skill_id', 'name', 'percentage', 'level', 'type']);
        $this->setErrorBag(['']);
    }
    
    /**
     * =======================================
     * == Init skill id to update it's data ==
     * =======================================
     * */
    public function setSocialID($id)
    {
        $this->skill_id = $id;
        $skill = Skill::where('id', $this->skill_id)->get(['name', 'percentage', 'level']);
        $this->name = $skill[0]->name;
        $this->level = $skill[0]->level;
        $this->percentage = $skill[0]->percentage;
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
            'type' => $validation['type'],
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

    /**
     * ==========================================
     * == Update old skills data from database ==
     * ==========================================
     * */
    public function update()
    {
        if( $this->skill_id === '' ) {
            $this->dispatchingMsgs('Unable to delete please select the target record', 'error');
        } else {
            $validation = $this->validate([
                'name' => ['required', 'string', 'max:255', 'unique:skills,name,' . $this->skill_id],
                'percentage' => ['required', 'integer'],
                'type' => ['required', 'string', 'max:255'],
                'level' => ['required', 'string', 'max:255'],
            ]);

            Skill::where('id', $this->skill_id)->update([
                'type' => $validation['type'],
                'name' => $validation['name'],
                'level' => $validation['level'],
                'percentage' => $validation['percentage'],
            ]);

            $this->resetInputs();

            $this->dispatchingMsgs('Successfully update skill data');

            $this->dispatch('modal:close');
        }
    }

    /**
     * ================================
     * == Cancel update skills data  ==
     * ================================
     * */
    public function cancel()
    {
        $this->resetInputs();
        $this->dispatch('modal:close');
    }

    /**
     * ==================================
     * == Deleting skills data from DB ==
     * ==================================
     * */
    public function delete()
    {
        Skill::findOrFail($this->skill_id)->delete();

        $this->dispatch('modal:close');

        $this->dispatchingMsgs('Successfully deleted selected record');

        $this->resetInputs();
    }

    public function render()
    {

        if($this->search !== '') {
            
            $skills = Skill::where('name', 'like', '%' . $this->search . '%')
                            ->orWhere('percentage', 'like', '%' . $this->search . '%')
                            ->orWhere('level', 'like', '%' . $this->search . '%')
                            ->paginate(5);

        } else {

            $skills = Skill::paginate(5);

        }

        return view(
            'livewire.panel.skills',
            ['skills' => $skills]
        );
    }
}
