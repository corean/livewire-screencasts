<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use Livewire\Component;

class CreatePostDialog extends Component
{
    public PostForm $form;

    public $show = false;

    public function addPost()
    {
        $this->form->save();

        $this->reset('show');

        sleep(1);

        $this->dispatch('post-added');
    }

    public function render()
    {
        return view('livewire.create-post-dialog');
    }
}
