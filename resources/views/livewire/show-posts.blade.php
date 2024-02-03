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
                        <x-dialog wire:model="showAddPostDialog">
                            <x-button>
                                <button type="button"
                                        class="font-medium text-sm bg-blue-500 text-white px-4 py-2 rounded-xl hover:bg-blue-600"
                                >New Post
                                </button>
                            </x-button>
                            <x-dialog.panel>
                                <form wire:submit="addPost"
                                      class="flex flex-col gap-4"
                                >
                                    <h2 class="font-bold text-3xl">Write You new Post!</h2>

                                    <hr class="w-[75%]">

                                    <label class="flex flex-col gap-2">
                                        Title
                                        <input wire:model="form.title"
                                               class="px-3 py-2 font-normal border border-slate-300 rounded-lg"
                                               placeholder="Title"
                                               autofocus
                                        >
                                        @error('form.title')<span
                                                class="text-red-500 font-normal text-sm">{{ $message }}</span>@enderror
                                    </label>

                                    <label class="flex flex-col gap-2">
                                        Content
                                        <textarea wire:model="form.content"
                                                  rows="5"
                                                  class="px-3 py-2 font-normal border border-slate-300 rounded-lg"
                                                  placeholder="Content"
                                        ></textarea>
                                        @error('form.content')<span
                                                class="text-red-500 font-normal text-sm">{{ $message }}</span>@enderror
                                    </label>

                                    <x-dialog.footer>
                                        <x-dialog.close-button>
                                            <button type="button"
                                                    class="text-lg text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold"
                                                    x-on:click="$dialog.close()"
                                            >
                                                Cancel
                                            </button>
                                        </x-dialog.close-button>

                                        <button type="submit"
                                                class="text-lg text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-semibold"
                                        >
                                            Create
                                        </button>
                                    </x-dialog.footer>
                                </form>

                            </x-dialog.panel>
                        </x-dialog>
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
