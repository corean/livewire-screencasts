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
    </td>
</tr>