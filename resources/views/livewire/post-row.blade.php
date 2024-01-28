<tr @class(['archived' => $post->is_archived])>
    <td>{{ $post->title }}</td>
    <td>{{ str($post->content)->limit(50) }}</td>
    <td>
        @unless($post->is_archived)
            <button
                    type="button"
                    wire:click="archive"
                    wire:confirm="Are you sure you want to archive this post?"
            >
                Archive
            </button>
        @endunless

        <button
                type="button"
                wire:click="$parent.delete({{ $post->id }})"
                wire:confirm="Are you sure you want to delete this post?"
        >
            Delete
        </button>
    </td>
</tr>