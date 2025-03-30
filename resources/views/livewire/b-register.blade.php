<div class="grid lg:grid-cols-1">
    <form
        wire:submit="submit"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Full Name') }}

                <input type="text"
                       wire:model="name"
                       name="name"
                       class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                       required
                >
            </label>

            @error('name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Email') }}

                <input
                    wire:model="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    id="email"
                    type="email"
                    required
                >
            </label>

            @error('email') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Department') }}

                <select
                    wire:model="department"
                    id="department"
                    name="department"
                    class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                >
                    <option>---------------</option>
                    @foreach($departments as $dep)
                        @if($dep->isValid())
                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                        @endif
                    @endforeach
                </select>
            </label>

            @error('department') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Data file') }}

                <input
                    wire:model="file"
                    class="
                        bg-gray-50 rounded-md
                        block w-full text-sm text-gray-500
                       file:mr-4 file:py-2 file:px-4
                       file:rounded file:border-0
                       file:text-sm file:font-semibold
                       file:bg-blue-50 file:text-blue-700
                       hover:file:bg-blue-100
                       focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                    id="file"
                    type="file"
                    required
                >
            </label>


            @error('file') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button
                class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                type="submit"
                wire:loading.attr="disabled"
            >
                {{ __("Submit") }}
            </button>
        </div>
    </form>
</div>
