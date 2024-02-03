<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public $posts;
    public $showModal = true;

    public function mount()
    {
        $this->posts = \App\Models\Post::all();
    }

    public function delete(Post $post)
    {
        $post->delete();

        sleep(1);
    }

    public function render()
    {
        return view('livewire.show-posts');
    }
}
