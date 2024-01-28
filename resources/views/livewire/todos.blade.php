<div>
    <form wire:submit="addTodo">
        <input type="text" wire:model.live.blur="todo">

        <span>Current todo: {{ $todo }}</span>
        <button type="submit">Add</button>

    </form>
    <ul>
        @foreach($todos as $todo)
            <li>{{ $todo }}</li>
        @endforeach
    </ul>
</div>
