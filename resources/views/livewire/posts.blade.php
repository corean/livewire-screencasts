<div>
    <h1>Posts:</h1>
    <table>
        <thead>
        <tr>
            <th>Title</th>
            <th>Content</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr wire:key="{{ $post->id }}">
                <td>{{ $post->title }}</td>
                <td>{{ str($post->body)->limit(50) }}</td>
                <td>
                    <button
                            type="button"
                            wire:click="delete({{ $post->id }})"
                            wire:confirm="Are you sure you want to delete this post?"
                    >
                        Delete
                    </button>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
