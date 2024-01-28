<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Component;

class CreatePost extends Component
{
    #[Rule('required', message: ':attribute 필드는 필수입니다.')]
    public $title = '';

    #[Rule('required', message: ':attribute 필드는 필수입니다.')]
    public $content = '';

    public function save()
    {
        $this->validate();

        Post::create([
            'title'   => $this->title,
            'content' => $this->content,
        ]);

        $this->redirect('/posts');
    }

    public function render()
    {
        return view('livewire.create-post');
    }
}
