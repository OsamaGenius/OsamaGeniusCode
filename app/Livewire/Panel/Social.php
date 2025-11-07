<?php

namespace App\Livewire\Panel;

use App\Models\Social as ModelsSocial;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;

class Social extends Component
{

    public $social_id = '';

    // #[Rule('required', as: 'Social Name', message: 'Friend the social link name is required')]
    public $name = '';

    public $url = '';

    public $status = 'Disabled';

    protected $rules = [
        'name'    => ['required', 'string', 'max:255', 'unique:'.ModelsSocial::class],
        'url'     => ['required', 'string', 'max:255', 'unique:'.ModelsSocial::class],
        'status'  => ['required', 'string', 'max:255'],
    ];

    /**
     * ====================================================
     * == Set The ID For Each Social Link From The Table ==
     * ====================================================
     * */ 
    public function setSocialID($id)
    {
        $this->social_id = $id;
        $link = ModelsSocial::where('id', $id)->get(['name', 'url', 'status']);
        $this->name = $link[0]->name;
        $this->url = $link[0]->url;
        $this->status = $link[0]->status;
    }

    /**
     * =======================================
     * == Adding new Social Links to Server ==
     * =======================================
     * */ 
    public function save() {

        // Validate incoming data
        $validation = $this->validate();

        ModelsSocial::create([
            'name'      => $validation['name'],
            'url'       => $validation['url'],
            'user_id'   => '1',
            // 'user_id'   => Auth::guard('panel')->user()->id,
            'status'    => $validation['status']
        ]);

        // Keeping the modal a live after press save button
        if($this->getErrorBag()->isNotEmpty()):
            $this->dispatch('modal:keep-open');
            return;
        endif;
        
        $this->resetInputs();

        $this->dispatch('modal:close');

        session()->flash('success', 'Social link added successfully.');        

    }

    /**
     * =====================================
     * == Updatingb Old Social Links Data ==
     * =====================================
     * */ 
    public function update() {
        // 
    }

    /**
     * ======================================
     * == Cancel Editing Social Links Data ==
     * ======================================
     * */ 
    public function cancel() {
        $this->dispatch('modal:close');
        $this->resetInputs();
    }

    /**
     * ================================================
     * == Deleting Social Links Data From The Server ==
     * ================================================
     * */ 
    public function delete() {
        // 
    }

    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */ 
    protected function resetInputs() {
        $this->reset(['name', 'url', 'status', 'social_id']);
    }

    public function render()
    {
        return view(
            'livewire.panel.social', 
            ['links' => ModelsSocial::all()]
        );
    }
}
