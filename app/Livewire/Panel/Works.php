<?php

namespace App\Livewire\Panel;

use App\Models\Project;
use App\traits\Dispatching;
use Illuminate\Database\Eloquent\Casts\Json;
use Illuminate\Support\Facades\Auth;
use League\CommonMark\CommonMarkConverter;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class Works extends Component
{

    use WithPagination, Dispatching, WithFileUploads;

    /*
    *===============
    *== Variables ==
    *===============
    **/ 
    public  $title = '',
            $price = '',
            $image,
            $vedio = '',
            $search = '',
            $repo_url = '',
            $category = '',
            $project_id = '', 
            $tech_stack = '',
            $payment = 'Free',
            $project_url = '',
            $description = '';

    public string $markdown = '';
    public $path;
    
    /*
    *======================
    *== Validation Rules ==
    *======================
    **/ 
    protected $rules = [
        'price'       => 'integer',
        'vedio'       => 'string|max:255',
        'payment'     => 'string|max:255',
        'repo_url'    => 'string|max:255',
        'project_url' => 'string|max:255',
        'description' => 'required|string|max:2000',
        'title'       => 'required|string|max:255',
        'category'    => 'required|string|max:255',
        'tech_stack'  => 'required|string|max:255',
        'image'       => 'nullable|image|max:2048'
    ];

    /**
     * ========================================
     * == Reset Form Feilds from Data Inside ==
     * ========================================
     * */
    public function restFeilds()
    {
        $this->resetInputs([
            'title', 
            'search', 
            'price', 
            'image', 
            'vedio',
            'payment', 
            'markdown', 
            'repo_url',
            'category', 
            'tech_stack',
            'project_id', 
            'description', 
            'project_url', 
        ]);
    }
    
    /*
    *=================================================================
    *== Filling the edit form when press edit icon in project table ==
    *=================================================================
    **/ 
    public function setProjectID($id)
    {
        $this->project_id = $id;
        $work = Project::where('id', $this->project_id)->get(['title', 'description', 'project_url', 'repo_url', 'category', 
                        'payment', 'price', 'tech_stack', 'vedio', 'image']);
        $this->title = $work[0]->title;
        $this->price = $work[0]->price;
        $this->vedio = $work[0]->vedio;
        $this->payment = $work[0]->payment;
        $this->repo_url = $work[0]->repo_url;
        $this->category = $work[0]->category;
        $this->tech_stack = $work[0]->tech_stack;
        $this->project_url = $work[0]->project_url;
        $this->description = $work[0]->description;
        $this->path = $work[0]->image;
        $converter = new CommonMarkConverter();
        $this->markdown = $converter->convert($work[0]->description);
    }

    /*
    *==================================================
    *== Canceling editing process and reset the form ==
    *==================================================
    **/ 
    public function cancel()
    {
        $this->restFeilds();
    }

    /*
    *==========================================
    *== Saving new projects data to database ==
    *==========================================
    **/ 
    public function save()
    {
        $validation = $this->validate();

        if($this->image) {
            $path = $this->image->store('Projects/' . $this->category, 'public');
        }

        Project::create([
            'title' => $validation['title'], 
            'image' => $path, 
            'price' => $validation['payment'] === 'Payed' ? $validation['price'] : 0.00, 
            'vedio' => $validation['vedio'],
            'payment' => $validation['payment'] ?? 'Free', 
            'repo_url' => $validation['repo_url'],
            'category' => $validation['category'], 
            'tech_stack' => Json::encode($validation['tech_stack']),
            'description' => $validation['description'], 
            'project_url' => $validation['project_url'],
            'user_id' => Auth::guard('panel')->user()->id, 
        ]);

        $this->dispatchingMsgs('Successfully added new work data');

        $this->restFeilds();
    }

    /*
    *================================================
    *== Updating old projects data inside database ==
    *================================================
    **/ 
    public function update()
    {
        $this->project_id = filter_var($this->project_id, FILTER_SANITIZE_NUMBER_INT);

        $oldImg = Project::where('id', $this->project_id)->get('image');

        $validation = $this->validate();

        if($this->image) {
            $path = $this->image->store('Projects/' . $this->category, 'public');
        } else {
            $path = $oldImg[0]->image;
        }

        $validation['image'] = $path;

        Project::where('id', $this->project_id)->update($validation);

        $this->dispatchingMsgs('Successfully Updated Project Data.');

        $this->restFeilds();
    }

    /*
    *==========================================
    *== Deleting projects data from database ==
    *==========================================
    **/ 
    public function delete()
    {
        $this->project_id = filter_var($this->project_id, FILTER_SANITIZE_NUMBER_INT);

        Project::where('id', $this->project_id)->delete();

        $this->dispatchingMsgs('Successfully Deleted Project Data.');

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
        if($this->description !== '') {
            $converter = app(\League\CommonMark\CommonMarkConverter::class);
            $this->markdown = (string) $converter->convert($this->description);
        }

        if($this->search !== '') {
            $works = Project::where('title', 'like', '%' . $this->search . '%')
                            ->orWhere('price', 'like', '%' . $this->search . '%')
                            ->orWhere('payment', 'like', '%' . $this->search . '%')
                            ->orWhere('category', 'like', '%' . $this->search . '%')
                            ->paginate(3);
        } else {
            $works = Project::paginate(3);
        }

        return view(
            'livewire.panel.works',
            [
                'works' => $works
            ]
        );
    }
}
