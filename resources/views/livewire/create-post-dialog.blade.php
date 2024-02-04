<div>
    <x-dialog wire:model="show">
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
</div>
