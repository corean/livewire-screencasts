<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;

class CreatePostForm extends Form
{
    #[Rule(['required','min:3'])]
    public $title = '';

    #[Rule(['required'])]
    public $content = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title'   => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
    }
}
