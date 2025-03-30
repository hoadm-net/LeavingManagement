<div>
    <form
        wire:submit="submit">

        <div class="mb-4">

            <ul>
                <li><strong>{{ __("Full Name") }}</strong>: {{ $user->name }}</li>
                <li><strong>Email</strong>: {{ $user->email }}</li>
            </ul>

        </div>
        <div class="mb-4">

            <label class="inline-flex items-center">
                <input type="checkbox"  wire:model="active">
                <span class="ml-2">{{ __("Active") }}</span>
            </label>

            @error('active') <span class="error">{{ $message }}</span> @enderror
        </div>
        <div class="mb-4">
            <label class="block text-black">
                {{ __('Role') }}
            </label>
            <select
                id="role"
                name="role"
                wire:model="role"
                class="border-gray-300 shadow col-start-1 row-start-1 w-full appearance-none rounded-md bg-white py-1.5 pl-3 pr-8 text-base text-gray-700 outline outline-1 -outline-offset-1 outline-gray-300 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-600 sm:text-sm/6">
                <option>-------------------</option>
                <option value="su" >{{ __("Super User") }}</option>
                <option value="hr" >{{ __("HR Staff") }}</option>
                <option value="manager">{{ __("Manager") }}</option>
                <option value="bod" >{{ __("Board of Directors") }}</option>
            </select>
            @error('role') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Password') }}
            </label>
            <input
                wire:model="password"
                class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password"
                type="password"
                placeholder="{{ __("Password") }}"
            />

            @error('password') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Confirm Password') }}
            </label>
            <input
                wire:model="password_confirmation"
                class="border-gray-300 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                id="password_confirmation"
                type="password"
                placeholder="{{ __("Confirm Password") }}"
            />

            @error('password_confirmation') <span class="error">{{ $message }}</span> @enderror
        </div>

        <div class="flex items-center justify-between">
            <button class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
                {{ __("Save") }}
            </button>
        </div>
    </form>

</div>
