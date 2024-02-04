<?php

namespace App\Livewire;

use App\Livewire\Forms\PostForm;
use App\Models\Post;
use Livewire\Component;

class PostRow extends Component
{
    public $post;

    public PostForm $form;

    public $showEditDialog = false;

    public function mount(Post $post)
    {
        $this->form->setPost($post);
    }

    public function save()
    {
        $this->form->update();

        $this->post->refresh();

        $this->showEditDialog = false;
    }
}
