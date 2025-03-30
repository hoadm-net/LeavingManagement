<div>
    <main class="mt-6">
        <div class="grid lg:grid-cols-1">
            <form
                wire:submit="submit"
                class="bg-white shadow-md rounded px-8 pt-6 pb-8">
                <div class="mb-4">
                    <label class="block text-black">
                        {{ __('Email') }}

                        <input
                            wire:model="mail"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="mail"
                            type="email"
                            placeholder="{{ __('Email') }}">
                    </label>

                    @error('mail') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-black">
                        {{ __('Fullname') }}

                        <input
                            wire:model="name"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="fullname"
                            type="text"
                            placeholder="{{ __('Fullname') }}">
                    </label>

                    @error('name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-black">
                        {{ __('Role') }}

                        <select
                            id="role"
                            name="role"
                            wire:model="role"
                            class="block w-full mt-1 rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option>-------------------</option>
                            <option value="su">{{ __("Super User") }}</option>
                            <option value="hr">{{ __("HR Staff") }}</option>
                            <option value="manager">{{ __("Manager") }}</option>
                        </select>
                    </label>

                    @error('role') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-black">
                        {{ __('Password') }}

                        <input
                            wire:model="password"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="password"
                            type="password"
                            placeholder="{{ __("Password") }}"
                        />
                    </label>


                    @error('password') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
                </div>

                <div class="mb-4">
                    <label class="block text-black">
                        {{ __('Confirm Password') }}

                        <input
                            wire:model="password_confirmation"
                            class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                            id="confirm_password"
                            type="password"
                            placeholder="{{ __("Confirm Password") }}"
                        />
                    </label>
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
