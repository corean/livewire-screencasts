<?php

namespace App\Livewire;

use Livewire\Component;

class Todos extends Component
{
    public $todos = [
        'Go to the store',
        'Go to the market',
        'Go to work',
    ];

    public $todo = '';

    public function addTodo()
    {
        $this->todos[] = $this->todo;
        $this->reset('todo');
    }

    public function render()
    {
        return view('livewire.todos');
    }
}
