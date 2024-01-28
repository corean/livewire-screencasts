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
            <livewire:post-row :post="$post" :key="$post->id" />
        @endforeach
        </tbody>
    </table>
</div>
