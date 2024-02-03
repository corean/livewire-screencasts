<?php

namespace App\Livewire;

use App\Livewire\Forms\CreatePostForm;
use App\Models\Post;
use Livewire\Component;

class ShowPosts extends Component
{
    public CreatePostForm $form;

    public $showAddPostDialog = false;

    public function addPost()
    {
        $this->form->save();

        $this->reset('showAddPostDialog');

        sleep(1);
    }

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
