<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public function delete(Post $post)
    {
        $post->delete();

        sleep(1);
    }

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->limit(10)->get();

        return view('livewire.show-posts', [
            'posts' => $posts,
        ]);
    }
}
