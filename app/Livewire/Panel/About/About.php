<?php

namespace App\Livewire\Panel\About;

use App\Models\Info;
use App\traits\Dispatching;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Illuminate\Support\Str;

class About extends Component
{
    use Dispatching;

    #[Rule('required|string|max:2000')]
    public $about;

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
            'title' => $validation['about'],
            'user_id' => 1,
        ]);

        $this->dispatchingMsgs('Successfully added details');

        $this->resetInputs('about');
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
        $this->about = $data[0]->title;
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
            'title' => $validation['about']
        ]);

        $this->dispatchingMsgs('Successfully updated the item');

        $this->resetInputs(['view_id', 'about', 'review', 'add', 'show', 'status']);
    }

    /*
    * |==============================================
    * |========= Init for delete operation ==========
    * |==============================================
    **/ 
    public function deleteID($deleteID)
    {
        $this->view_id = $deleteID;
    }

    /*
    * |==============================================
    * |========= exec the delete operation ==========
    * |==============================================
    **/ 
    public function delete()
    {
        Info::where('id', $this->view_id)->delete();

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
        $this->resetInputs(['view_id', 'about', 'review', 'add', 'show', 'status']);
    }

    /*
    * |==============================================
    * |====== Calling the view and render it ========
    * |==============================================
    **/ 
    public function render()
    {

        $converter = app(\League\CommonMark\CommonMarkConverter::class);

        if( Str::length($this->about) > 1 ) {
            $this->review = (string) $converter->convert($this->about);
        } else {
            $this->resetInputs('review');
        }

        return view(
            'livewire.panel.about.about',
            [
                'aboutDetails' => Info::where('type', 'About')->orderby('updated_at', 'desc')->get()
            ]
        );
    }
}
