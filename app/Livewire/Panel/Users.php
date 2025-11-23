<?php

namespace App\Livewire\Panel;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Rule;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class Users extends Component
{
    use WithPagination, WithFileUploads;

    /**
     * =========================
     * == Variables and Rules ==
     * =========================
     * */
    #[Rule('integer')]
    public $user_id = '';

    #[Rule('string|max:255')]
    public $search = '';

    #[Rule('nullable|image|max:1024')]
    public $image;

    #[Rule('required|string|max:255')]
    public $name = '';

    #[Rule('required|email|unique:' . User::class)]
    public $email = '';

    #[Rule('required|string|max:255')]
    public $password = '';

    #[Rule('required|string')]
    public $group_id = 'Users';

    #[Rule('required|string')]
    public $approvent = 'No';

    #[Rule('required|string')]
    public $status = 'Not Active';

    public $path = 'imgs/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png';

    /**
     * ========================
     * == Storing users data ==
     * ========================
     * */
    public function save()
    {
        $validition = $this->validate();

        if($this->image) {
            $validition['image'] = $this->image->store('Profiles', 'public');
        } else {
            $validition['image'] = 'Profiles/PZjJXeqoCke0EniWupHgWeaW1D8cHpcQqr6j7JdJ.png';
        }

        User::create($validition);

        $this->resetInputs();

        $this->dispatchingMsgs('Successfully added user data');
    }

    /**
     * =========================
     * == Updating Users data ==
     * =========================
     * */
    public function update()
    {
        $validition = $this->validate([
            'email' => 'required|email|max:255|unique:'.User::class.',email,'.$this->user_id,
            'group_id' => 'required|string',
            'status' => 'required|string',
            'approvent' => 'required|string',
            'name' => 'required|string|max:255'
        ]);

        if($this->image) {
            $validition['image'] = $this->image->store('Profiles', 'public');
        }

        if($this->password) {
            $validition['password'] = Hash::make($this->password);
        }

        User::where('id', $this->user_id)->update($validition);

        $this->resetInputs();

        $this->dispatchingMsgs('Successfully updated user data');
    }

    /**
     * =========================
     * == Deleting users data ==
     * =========================
     * */
    public function delete()
    {
        User::where('id', $this->user_id)->delete();

        $this->resetInputs();

        $this->dispatchingMsgs('Successfully deleted user data');
    }

    /**
     * =============================
     * == Cancel update operation ==
     * =============================
     * */
    public function cancel()
    {
        $this->dispatch('modal:close');
        $this->resetInputs();
    }

    /**
     * =======================
     * == Reset form feilds ==
     * =======================
     * */
    protected function resetInputs()
    {
        $this->reset([
            'group_id',
            'user_id',
            'search',
            'image',
            'name',
            'email',
            'status',
            'password',
            'approvent',
        ]);
        $this->setErrorBag(['']);
    }

    /**
     * ==========================
     * == Dispatching messages ==
     * ==========================
     * */
    protected function dispatchingMsgs($message,  $type = 'success', $event = 'show-alert')
    {
        $this->dispatch(
            $event,
            message: $message,
            type: $type,
        );
    }

    /**
     * ====================================================
     * == Set The ID For Each Social Link From The Table ==
     * ====================================================
     * */
    public function setSocialID($id)
    {
        $this->user_id = $id;
        $user = User::where('id', $this->user_id)->get(['image', 'name', 'email', 'status', 'approvent', 'group_id']);
        $this->path = $user[0]->image;
        $this->name = $user[0]->name;
        $this->email = $user[0]->email;
        $this->status = $user[0]->status;
        $this->approvent = $user[0]->approvent;
        $this->group_id = $user[0]->group_id;
    }

    /**
     * ======================================
     * == Generate Random Stronge Password ==
     * ======================================
     * */
    public function generate()
    {
        $this->password = Str::random(16);
        $this->dispatchingMsgs('Password generated successfully, copy it please');
    }


    /**
     * ===========================
     * == Viewing the user page ==
     * ===========================
     * */
    public function render()
    {
        if ($this->search !== '') {
            $users = User::where('name', 'like', '%' . $this->search . '%')
                        ->orWhere('email', 'like', '%' . $this->search . '%')
                        ->orWhere('status', 'like', '%' . $this->search . '%')
                        ->orWhere('approvent', 'like', '%' . $this->search . '%')
                        ->orWhere('group_id', 'like', '%' . $this->search . '%')
                        ->paginate(3);
        } else {
            $users = User::paginate(3);
        }

        return view(
            'livewire.panel.users',
            ['users' => $users]
        );
    }
}
