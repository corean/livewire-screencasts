<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Todos')]
class Todos extends Component
{
    public $todos = [];

    public $todo = '';

    public function mount()
    {
        $this->todos = [
            'Go to the store',
            'Go to the market',
            'Go to work',
        ];
    }

    public function updated($property, $value): void
    {
        $this->$property = strtoupper($value);
    }

    public function updatedTodo($value)
    {
        $this->todo = strtoupper($value);
    }

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
