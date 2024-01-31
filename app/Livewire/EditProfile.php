<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Validation\Rule;
use Livewire\Attributes\Validate;
use Livewire\Component;

class EditProfile extends Component
{
    public User $user;

    #[Validate]
    public $username = '';
    public $bio = '';

    public $showSuccessIndicator = false;

    public function mount()
    {
        $this->user = auth()->user();

        $this->username = $this->user->username;
        $this->bio = $this->user->bio;
    }

    public function rules()
    {
        return [
            'username' => [
                'required',
                Rule::unique('users', 'username')->ignore($this->user->id),
            ],
        ];
    }

    public function save()
    {
        $this->validate();

        $this->user->username = $this->username;
        $this->user->bio = $this->bio;

        $this->user->save();

        sleep(10);

        $this->showSuccessIndicator = true;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}