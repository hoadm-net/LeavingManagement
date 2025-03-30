<div class="grid lg:grid-cols-1">
    <form
        wire:submit="submit"
        class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Full Name') }}

                <textarea
                    wire:model="name"
                    name="name"
                    id="name" rows="2"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required
                ></textarea>
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
                {{ __('Shift') }}

                <input
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text"
                    id="shift"
                    wire:model="shift"
                    required
                >
            </label>

            @error('shift') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Start Time') }}

                <input
                    class="hw-dt mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    id="begin"
                    type="text"
                    wire:model="begin"
                    required
                >
            </label>

            @error('begin') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('End Time') }}

                <input
                    class="hw-dt mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    type="text"
                    id="end"
                    wire:model="end"
                    required
                >
            </label>

            @error('end') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Job Description') }}

                <textarea
                    wire:model="description"
                    name="description"
                    required
                    id="description" rows="3"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                ></textarea>
            </label>

            @error('description') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center text-black">
                <input
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                    wire:model="urgent"
                >
                <span class="ml-2">{{ __('Urgent') }}</span>
            </label>
        </div>

        <div class="mb-4">
            <label class="inline-flex items-center text-black">
                <input
                    type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-offset-0 focus:ring-indigo-200 focus:ring-opacity-50"
                    wire:model="bus">
                <span class="ml-2">{{ __('Company Bus') }}</span>
            </label>
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
