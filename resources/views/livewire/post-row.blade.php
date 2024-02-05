<tr class="text-left text-slate-900">
    <td class="pl-6 py-4 font-medium">{{ $post->title }}</td>
    <td class="pl-4 py-4 text-left text-slate-500">{{ str($post->content)->limit(50) }}</td>
    <td class="pl-4 py-4 pr-6 flex gap-2 justify-end">

        <x-menu>
            <x-menu.button>
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM12.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0zM18.75 12a.75.75 0 11-1.5 0 .75.75 0 011.5 0z" />
                </svg>
            </x-menu.button>

            <x-menu.items>
                <x-dialog wire:model="showEditDialog">
                    <x-dialog.open>
                        <x-menu.close>
                            <x-menu.item>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path d="M5.433 13.917l1.262-3.155A4 4 0 017.58 9.42l6.92-6.918a2.121 2.121 0 013 3l-6.92 6.918c-.383.383-.84.685-1.343.886l-3.154 1.262a.5.5 0 01-.65-.65z" />
                                    <path d="M3.5 5.75c0-.69.56-1.25 1.25-1.25H10A.75.75 0 0010 3H4.75A2.75 2.75 0 002 5.75v9.5A2.75 2.75 0 004.75 18h9.5A2.75 2.75 0 0017 15.25V10a.75.75 0 00-1.5 0v5.25c0 .69-.56 1.25-1.25 1.25h-9.5c-.69 0-1.25-.56-1.25-1.25v-9.5z" />
                                </svg>
                                Edit
                            </x-menu.item>
                        </x-menu.close>
                    </x-dialog.open>

                    <x-dialog.panel>
                        <form wire:submit="save" class="flex flex-col gap-4">
                            <h2 class="font-bold text-3xl">Write You Edit Post!</h2>

                            <hr class="w-[75%]">

                            <label class="flex flex-col gap-2">
                                Title
                                <input wire:model="form.title"
                                       class="px-3 py-2 font-normal border border-slate-300 rounded-lg read-only:opacity-50 read-only:cursor-not-allowed"
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
                                          class="px-3 py-2 font-normal border border-slate-300 rounded-lg read-only:opacity-50 read-only:cursor-not-allowed"
                                          placeholder="Content"
                                ></textarea>
                                @error('form.content')<span
                                        class="text-red-500 font-normal text-sm">{{ $message }}</span>@enderror
                            </label>

                            <x-dialog.footer>
                                <x-dialog.close-button>
                                    <x-dialog.close-button>
                                        <button type="button" class="text-center rounded-xl bg-slate-300 text-slate-800 px-6 py-2 font-semibold">Cancel</button>
                                    </x-dialog.close-button>

                                </x-dialog.close-button>

                                <button type="submit"
                                        class="text-center rounded-xl bg-blue-500 text-white px-6 py-2 font-semibold disabled:cursor-not-allowed disabled:opacity-50">Save</button>
                            </x-dialog.footer>
                        </form>
                    </x-dialog.panel>
                </x-dialog>

                <x-dialog>
                    <x-dialog.open>
                        <x-menu.close>
                            <x-menu.item>
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4">
                                    <path fill-rule="evenodd" d="M8.75 1A2.75 2.75 0 006 3.75v.443c-.795.077-1.584.176-2.365.298a.75.75 0 10.23 1.482l.149-.022.841 10.518A2.75 2.75 0 007.596 19h4.807a2.75 2.75 0 002.742-2.53l.841-10.52.149.023a.75.75 0 00.23-1.482A41.03 41.03 0 0014 4.193V3.75A2.75 2.75 0 0011.25 1h-2.5zM10 4c.84 0 1.673.025 2.5.075V3.75c0-.69-.56-1.25-1.25-1.25h-2.5c-.69 0-1.25.56-1.25 1.25v.325C8.327 4.025 9.16 4 10 4zM8.58 7.72a.75.75 0 00-1.5.06l.3 7.5a.75.75 0 101.5-.06l-.3-7.5zm4.34.06a.75.75 0 10-1.5-.06l-.3 7.5a.75.75 0 101.5.06l.3-7.5z" clip-rule="evenodd" />
                                </svg>

                                Delete
                            </x-menu.item>
                        </x-menu.close>
                    </x-dialog.open>

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
                                            type="button"
                                            x-bind:disabled="confirmation !== 'CONFIRM'"
                                            wire:click="$dispatch('deleted')"
                                            {{--wire:click="$parent.delete({{ $post->id }})"--}}
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
            </x-menu.items>
        </x-menu>
    </td>
</tr>