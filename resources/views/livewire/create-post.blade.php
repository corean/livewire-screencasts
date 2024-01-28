<div>
    <h2>New Post:</h2>

    Current Title (alpinjs) : <span x-html="$wire.title.toUpperCase()"></span>
    <button type="button" x-on:click="$wire.save()">Save</button>
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
            <small>Words: <span x-text="$wire.content.split(' ').length - 1"></span></small>
        </label>

        <button type="submit">Save</button>
    </form>
</div>
