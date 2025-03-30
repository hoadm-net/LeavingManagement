<div>

    <div class="mb-4 border-b-2 my-2">
        <h3 class="text-lg font-semibold mb-2">{{ __("Users") }}</h3>
        <button
            wire:click="$dispatch('openModal', { component: 'add-manager', arguments: { department: {{ $department }} }})"
            class="mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300 transition duration-200">
            {{ __('Add New Manager') }}</button>

        <table class="min-w-full divide-y divide-gray-200 dark:divide-none">
            <thead class="bg-gray-50 dark:bg-gray-800">
                <tr>
                    <td class="p-4">#</td>
                    <td class="p-4">{{ __("Manager") }}</td>
                    <td class="p-4">{{ __("Level") }}</td>
                    <td class="p-4">{{ __("Action") }}</td>
                </tr>
            </thead>
            <tbody>
            @foreach($department->users as $u)
                <tr @if($loop->index % 2 != 0)class="bg-gray-50"@endif>
                    <td class="p-2">{{ $loop->index + 1 }}</td>
                    <td class="p-2">{{ $u->name }}</td>
                    <td class="p-2">{{ $u->pivot->level }}</td>
                    <td class="pt-4">
                        <button
                            class="mb-4 bg-red-500 text-white px-2 py-1 rounded-lg hover:bg-red-600 focus:ring focus:ring-red-300 transition duration-200"
                            wire:click="removeUser({{ $u->id }})"
                            wire:confirm="Bạn có muốn xóa quản trị viên này không?"
                        >{{ __("Remove") }}</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <form
        wire:submit="submit">

        <h3 class="text-lg font-semibold mb-4">{{ __("Department Information") }}
            @if ($department->isValid())
                <svg class="inline-block h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            @else
                <svg class="inline-block h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                </svg>
            @endif
        </h3>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                {{ __('Name') }}
            </label>
            <input
                wire:model="name"
                class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="name"
                type="text"
            />

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
                {{ __("Description") }}
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
                {{ __("Save") }}
            </button>
        </div>
    </form>

</div>
