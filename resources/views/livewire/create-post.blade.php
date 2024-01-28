<div>
    <h2>New Post:</h2>
    <form wire:submit="save">
        <label>
            <span>title</span>
            <input type="text" wire:model="title">
            @error('title') <span>{{ $message }}</span> @enderror
        </label>

        <label>
            <span>content</span>
            <textarea wire:model="content"></textarea>
            @error('content') <span>{{ $message }}</span> @enderror
        </label>

        <button type="submit">Save</button>
    </form>
</div>
