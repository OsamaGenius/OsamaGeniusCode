<?php

namespace App\Livewire\Panel;

use App\Livewire\Demo\Social as DemoSocial;
use App\Models\Social as ModelsSocial;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

use function PHPUnit\Framework\isEmpty;

class Social extends Component
{

    use WithPagination;

    public $search = '';

    public $social_id = '';

    // #[Rule('required', as: 'Social Name', message: 'Friend the social link name is required')]
    public $name = '';

    public $url = '';

    public $status = 'Disabled';

    protected $rules = [
        'name'    => ['required', 'string', 'max:255', 'unique:' . ModelsSocial::class],
        'url'     => ['required', 'string', 'max:255', 'unique:' . ModelsSocial::class],
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
    public function save()
    {

        // Validate incoming data
        $validation = $this->validate();

        $links = ModelsSocial::create([
            'name'      => $validation['name'],
            'url'       => $validation['url'],
            'user_id'   => '1',
            // 'user_id'   => Auth::guard('panel')->user()->id,
            'status'    => $validation['status']
        ]);

        // Keeping the modal a live after press save button
        if ($this->getErrorBag()->isNotEmpty()) :
            $this->dispatch('modal:keep-open');
            return;
        endif;

        $this->resetInputs();

        $this->dispatch('modal:close');

        $this->dispatch('update-view', $links);

        $this->dispatchingMsgs('Successfully added new data');
    }

    /**
     * =====================================
     * == Updatingb Old Social Links Data ==
     * =====================================
     * */
    public function update()
    {
        if ($this->social_id === '') {
            $this->dispatchingMsgs('Unable to update empty record', 'error');
        } else {
            $validation = $this->validate([
                'social_id' => ['required', 'integer'],
                'name'    => ['required', 'string', 'max:255'],
                'url'     => ['required', 'string', 'max:255'],
                'status'  => ['required', 'string', 'max:255'],
            ]);
            ModelsSocial::where('id', $this->social_id)->update([
                'name' => $validation['name'],
                'url' => $validation['url'],
                'status' => $validation['status'],
                'user_id' => '1',
            ]);

            // Keeping the modal a live after press save button
            if ($this->getErrorBag()->isNotEmpty()) :
                $this->dispatch('modal:keep-open');
                return;
            endif;

            $this->resetInputs();

            $this->dispatch('modal:close');

            $this->dispatchingMsgs('Successfully updated selected record');
        }
    }

    /**
     * ======================================
     * == Cancel Editing Social Links Data ==
     * ======================================
     * */
    public function cancel()
    {
        $this->dispatch('modal:close');
        $this->resetInputs();
    }

    /**
     * ================================================
     * == Deleting Social Links Data From The Server ==
     * ================================================
     * */
    public function delete()
    {
        ModelsSocial::findOrFail($this->social_id)->delete();

        $this->dispatch('modal:close');

        $this->dispatchingMsgs('Successfully deleted selected record');
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
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    protected function resetInputs()
    {
        $this->reset(['name', 'url', 'status', 'social_id']);
    }

    public function render()
    {
        if(strlen($this->search) > 2) {
            $links = ModelsSocial::where('name', 'like', '%'.$this->search.'%')->paginate(4);
        } else {
            $links = ModelsSocial::paginate(4);
        }

        return view(
            'livewire.panel.social',
            ['links' => $links]
        );
    }
}
