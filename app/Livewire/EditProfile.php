<?php

namespace App\Livewire;

use App\Livewire\Forms\EditProfileForm;
use Livewire\Component;

class EditProfile extends Component
{
    public EditProfileForm $form;

    public $showSuccessIndicator = false;

    public function mount()
    {
        $this->form->setUp(auth()->user());
    }

    public function save()
    {
        $this->form->update();

        sleep(1);

        $this->showSuccessIndicator = true;
    }

    public function render()
    {
        return view('livewire.edit-profile');
    }
}