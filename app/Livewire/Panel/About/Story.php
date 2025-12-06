<?php

namespace App\Livewire\Panel\About;

use App\Models\Info;
use App\traits\Dispatching;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;

class Story extends Component
{
    use Dispatching, WithPagination;

    #[Rule('required|string|max:2000')]
    public $story;

    public $view_id = '';

    public $review = '<span class="text-secondary" style="opacity: .95">No thing to show</span>';

    
    public $add = true;

    public $show = false;

    public $status = true;

    /*
    * |==============================================
    * |========== Saving new details in DB ==========
    * |==============================================
    **/ 
    public function save()
    {
        $validation = $this->validate();

        Info::create([
            'title' => $validation['story'],
            'type'  => 'Story',
            'user_id' => 1,
        ]);

        $this->dispatchingMsgs('Successfully added details');

        $this->resetInputs('story');
    }

    /*
    * |==============================================
    * |========= Init for update operation ==========
    * |==============================================
    **/ 
    public function setPreview($previewID)
    {
        
        $converter = app(\League\CommonMark\CommonMarkConverter::class);
        $data = Info::where('id', $previewID)->get(['id', 'title']);
        $this->view_id = $data[0]->id;
        $this->story = $data[0]->title;
        $this->review = (string) $converter->convert($data[0]->title);
        $this->add = true;
        $this->show = false;
        $this->status = false;
    }

    /*
    * |==============================================
    * |========= exec the update operation ==========
    * |==============================================
    **/ 
    public function update()
    {
        $validation = $this->validate();

        Info::where('id', $this->view_id)->update([
            'title' => $validation['story']
        ]);

        $this->dispatchingMsgs('Successfully updated the item');

        $this->resetFeilds();
    }

    /*
    * |==============================================
    * |========= Init for delete operation ==========
    * |==============================================
    **/ 
    public function deleteID($deleteID)
    {
        $this->view_id = $deleteID;
        $this->delete($this->view_id);
    }

    /*
    * |==============================================
    * |========= exec the delete operation ==========
    * |==============================================
    **/ 
    public function delete($id)
    {
        Info::where('id', $id)->delete();

        $this->dispatchingMsgs('Successfully delete the item');

        $this->resetInputs('view_id');
    }

    /*
    * |==============================================
    * |========= exec the cancel operation ==========
    * |==============================================
    **/ 
    public function cancel()
    {
        $this->resetFeilds();
    }

    /*
    * |============================================
    * |========= Reset Input Form Feilds ==========
    * |============================================
    **/ 
    public function resetFeilds()
    {
        $this->resetInputs(['view_id', 'story', 'review', 'add', 'show', 'status']);
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
        return view(
            'livewire.panel.about.story',
            [
                'data' => Info::where('type', 'Story')->paginate(5)
            ]
        );
    }
}
