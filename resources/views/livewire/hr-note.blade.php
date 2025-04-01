<div class="p-4">
    <h2 class="text-xl text-blue-500 mb-4">{{ __("HR Notes") }}</h2>

    <div class="mb-4">
        <label class="block text-black">
            {{ __('Year') }}
            <input
                wire:model="year"
                type="number"
                id="year"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
        </label>

        @error('year') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-black">
            {{ __('Total annual leave (days)') }}
            <input
                wire:model="total_days"
                type="number"
                id="total_days"
                min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
        </label>

        @error('total_days') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-black">
            {{ __('Already used until the application date (Include this time)') }}
            <input
                wire:model="used_days"
                type="number"
                id="used_days"
                min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
        </label>

        @error('used_days') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
    </div>

    <div class="mb-4">
        <label class="block text-black">
            {{ __('Remaining leave days') }}
            <input
                wire:model="remaining_days"
                type="number"
                id="remaining_days"
                min="0"
                class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
            >
        </label>

        @error('remaining_days') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
    </div>


    <div class="mb-4">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="note">
            {{ __("Notes") }}
        </label>
        <textarea
            wire:model="note"
            name="note"
            id="note" rows="3" class="block border-gray-300 shadow  w-full rounded-md bg-white px-3 py-1.5 text-base text-gray-900 outline outline-1 -outline-offset-1 outline-gray-300 placeholder:text-gray-400 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6"></textarea>
        @error('note') <span class="error">{{ $message }}</span> @enderror
    </div>

    <div class="flex space-x-4">
        <!-- Nút màu xanh -->
        <button
            wire:click="save()"
            wire:loading.attr="disabled"
            class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">
            {{ __("Save") }}
        </button>

        <!-- Nút màu đỏ -->
        <button
            wire:click="cancel()"
            wire:loading.attr="disabled"
            class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600">
            {{ __("Cancel") }}
        </button>
    </div>
</div>
