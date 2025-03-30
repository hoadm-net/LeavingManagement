<div>
    <main class="mt-6">
        <div class="grid lg:grid-cols-1">
            <form
                wire:submit="submit"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        {{ __("Department") }}
                    </label>
                    <input
                        wire:model="name"
                        class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="name"
                        type="text">
                    @error('name') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                        {{ __("Number of Management Levels") }}
                    </label>
                    <input
                        wire:model="max_level"
                        class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="max_level"
                        type="number"
                    >
                    @error('max_level') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="description">
                        {{ __('Description') }}
                    </label>
                    <textarea
                        wire:model="description"
                        id="description"
                        rows="3"
                        class="block border-gray-300 shadow  w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
                    @error('description') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="flex items-center justify-between">
                    <button class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                        {{ __("Submit") }}
                    </button>
                </div>
            </form>
        </div>
    </main>
</div>
