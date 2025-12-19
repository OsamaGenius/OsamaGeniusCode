<?php

namespace App\Livewire\Panel;

use App\Models\Skill;
use App\traits\Dispatching;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Skills extends Component
{

    use WithPagination, Dispatching;

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
    protected function restFeilds()
    {
        $this->resetInputs(['search', 'skill_id', 'name', 'percentage', 'level', 'type']);
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
            'user_id' => Auth::guard('panel')->user()->id,
        ]);

        // Show success message
        $this->dispatchingMsgs('Successfully added new skills data');

        // Reset form feilds
        $this->restFeilds();

        $this->closeModal('skills-add-modal');

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

            $this->restFeilds();

            $this->dispatchingMsgs('Successfully update skill data');

            $this->closeModal('skills-edit-modal');

        }
    }

    /**
     * ================================
     * == Cancel update skills data  ==
     * ================================
     * */
    public function cancel()
    {
        $this->restFeilds();

        $this->closeModal('skills-edit-modal');
    }

    /**
     * ==================================
     * == Deleting skills data from DB ==
     * ==================================
     * */
    public function delete()
    {
        Skill::findOrFail($this->skill_id)->delete();

        $this->closeModal('skills-del-modal');

        $this->dispatchingMsgs('Successfully deleted selected record');

        $this->restFeilds();
    }

    /**
     * ======================================
     * == Mount data to the view when init ==
     * ======================================
     * */
    public function mount()
    {
        Dispatching::notAdminsAuth();
    }

    /**
     * ========================
     * == Rendering the view ==
     * ========================
     * */
    public function render()
    {

        if($this->percentage !== '') {
            switch ($this->percentage) {
                case  $this->percentage < 55:
                    $this->level = 'Beginner';
                    break;
                case  $this->percentage < 85:
                    $this->level = 'Intermediate';
                    break;
                case  $this->percentage <= 100:
                    $this->level = 'Expert';
                    break;
                default:
                    $this->level = 'Intermediate';
                    break;
            }
        } else {
            $this->level = 'Intermediate';
        }

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
