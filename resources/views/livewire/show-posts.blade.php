<div>
    <div class="flex flex-col gap-8 min-w-[40rem]">
        <h3 class="text-3xl font-semibold leading-6 text-slate-900">Blog Posts</h3>
        <div class="shadow rounded-xl overflow-hidden bg-white">
            <table class="min-w-full divide-y divide-slate-300">
                <thead class="bg-slate-100 py-2">
                <tr class="text-left text-slate-800 font-semibold">
                    <th class="pl-6 py-4">Title</th>
                    <th class="pl-4 py-4">Content</th>
                    <th class="pl-4 py-4 pr-4 text-right">
                        <livewire:create-post-dialog @post-added="$refresh" />
                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-200" wire:loading.class="opacity-50">
                @foreach($posts as $post)
                    <livewire:post-row :key="$post->id" :post="$post"
                                       @deleted="delete({{ $post->id }})"
                    />
                @endforeach
            </table>
        </div>
    </div>
</div>
