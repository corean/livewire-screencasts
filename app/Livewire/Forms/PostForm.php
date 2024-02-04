<?php

namespace App\Livewire\Forms;

use App\Models\Post;
use Livewire\Attributes\Rule;
use Livewire\Form;

class PostForm extends Form
{
    #[Rule(['required','min:3'])]
    public $title = '';

    #[Rule(['required'])]
    public $content = '';

    public Post $post;

    public function setPost(Post $post)
    {
        $this->post = $post;
        $this->title = $post->title;
        $this->content = $post->content;
    }

    public function save()
    {
        $this->validate();

        Post::create([
            'title'   => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
    }

    public function update()
    {
        $this->validate();

        $this->post->update([
            'title'   => $this->title,
            'content' => $this->content,
        ]);

        $this->reset(['title', 'content']);
    }
}
