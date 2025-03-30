<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manager') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <button
                        class="mb-4 bg-blue-500 text-white px-4 py-2 rounded-lg hover:bg-blue-600 focus:ring focus:ring-blue-300 transition duration-200"
                        onclick="Livewire.dispatch('openModal', { component: 'CreateUser' })">{{ __("Add New") }}</button>

                    <livewire:show-users />
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
