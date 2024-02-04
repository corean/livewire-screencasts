<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Attributes\On;
use Livewire\Component;

class ShowPosts extends Component
{
    public function delete(Post $post)
    {
        $post->delete();

        sleep(1);
    }


    /* 하위 component에서 dispatch() 받기
    #[on('post-added')]
    public function added()
    {
        dd('post added');
    }
    */

    public function render()
    {
        $posts = Post::orderBy('id', 'desc')->limit(10)->get();

        return view('livewire.show-posts', [
            'posts' => $posts,
        ]);
    }
}
