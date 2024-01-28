<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostRow extends Component
{
    public $post;

    public function archive()
    {
        $this->post->archive();
    }
}