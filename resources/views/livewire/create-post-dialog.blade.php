<div>
    <x-dialog wire:model="show">
        <x-dialog.open>
            <button type="button" class="text-white bg-blue-500 rounded-xl px-4 py-2 text-sm">New Post</button>
        </x-dialog.open>
        <x-dialog.panel>
            <form wire:submit="addPost"
                  class="flex flex-col gap-4"
            >
                <h2 class="font-bold text-3xl">Write You new Post!</h2>

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
</div>
