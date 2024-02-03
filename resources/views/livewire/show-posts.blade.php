<div>
    <div class="flex flex-col gap-8 min-w-[40rem]">
        <h3 class="text-3xl font-semibold leading-6 text-slate-900">Blog Posts</h3>
        <div class="shadow rounded-xl overflow-hidden bg-white">
            <table class="min-w-full divide-y divide-slate-300">
                <thead class="bg-slate-100 py-2">
                <tr class="text-left text-slate-800 font-semibold">
                    <th class="pl-6 py-4">Title</th>
                    <th class="pl-4 py-4">Content</th>
                    <th class="pl-4 py-4 pr-4">

                    </th>
                </tr>
                </thead>
                <tbody class="divide-y divide-slate-200" wire:loading.class="opacity-50">
                @foreach($posts as $post)
                    <tr class="text-left text-slate-900">
                        <td class="pl-6 py-4 font-medium">{{ $post->title }}</td>
                        <td class="pl-4 py-4 text-left text-slate-500">{{ str($post->content)->limit(50) }}</td>
                        <td class="pl-4 py-4 text-right pr-6">
                            <x-dialog>
                                <x-dialog.button>
                                    <button type="button" class="font-medium text-red-600">
                                        Delete
                                    </button>
                                </x-dialog.button>

                                <x-dialog.panel>
                                    <div class="flex flex-col gap-6" x-data="{ confirmation: '' }">
                                        <h2 class="font-semibold text-3xl">Are you sure you?</h2>
                                        <h2 class="text-lg text-slate-700">This operation is permanant and can't be
                                            reversed. This post will be deleted forever.</h2>

                                        <label class="flex flex-col gap-2">
                                            Type "CONFIRM"
                                            <input x-model="confirmation"
                                                   class="px-3 py-2 border border-slate-300 rounded-lg"
                                                   placeholder="CONFIRM">
                                        </label>

                                        <x-dialog.footer>
                                            <x-dialog.close-button>
                                                <button class="text-lg text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">
                                                    Cancel
                                                </button>
                                            </x-dialog.close-button>

                                            <x-dialog.close-button>
                                                <button
                                                        :disabled="confirmation !== 'CONFIRM'"
                                                        wire:click="delete({{ $post->id }})"
                                                        {{--
                                                        x-on:click="
                                                        await $wire.delete({{ $post->id }});
                                                        $dialog.close();
                                                        "
                                                        --}}
                                                        class="text-lg text-center rounded-xl bg-red-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">
                                                    Delete
                                                </button>
                                            </x-dialog.close-button>
                                        </x-dialog.footer>
                                    </div>


                                </x-dialog.panel>
                            </x-dialog>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

    </div>


</div>
