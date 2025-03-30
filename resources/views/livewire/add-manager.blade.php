<div>
    <main class="mt-6">
        <div class="grid lg:grid-cols-1">
            <form
                wire:submit="submit"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8">

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="user">
                        {{ __("Managers") }}
                    </label>
                    <select
                        id="user"
                        name="user"
                        wire:model="user"
                        class="border-gray-300 shadow col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-700 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                        <option>-------------------</option>
                        @foreach($users as $u)
                            <option value="{{ $u->id }}">{{ $u->name }}</option>
                        @endforeach
                    </select>
                    @error('role') <span class="error">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="level">
                        {{ __("Level") }} (1 -> {{ $department->max_level }})
                    </label>
                    <input
                        wire:model="level"
                        class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                        id="level"
                        type="number"
                    >
                    @error('level') <span class="error">{{ $message }}</span> @enderror
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
