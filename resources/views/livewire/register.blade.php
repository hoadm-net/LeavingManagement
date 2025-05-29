<div class="grid lg:grid-cols-1">
    <form wire:submit.prevent="submit" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 space-y-6">
        <!-- Section 1: Basic Info -->
        <div class="mb-4">
            <label class="block text-black">
                {{ __('Full Name') }}
                <input
                    wire:model="full_name"
                    type="text"
                    id="fullName"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </label>

            @error('full_name') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Email') }}
                <input
                    wire:model="email"
                    type="email"
                    id="email"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
            </label>

            @error('email') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Position') }}
                <input
                    wire:model="position"
                    type="text"
                    id="position"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </label>

            @error('position') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Shift') }}
                <input
                    wire:model="shift"
                    type="text"
                    id="shift"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    >
            </label>

            @error('shift') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Department') }}

                <select
                    wire:model="department_id"
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

            @error('department_id') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="mb-4">
            <label class="block text-black">
                {{ __('Estimated time for leave (days)') }}
                <input
                    wire:model="leave_days"
                    type="number"
                    min="0.25"
                    step="0.25"
                    id="leaveDays"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </label>

            @error('leave_days') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <div class="flex gap-4">
            <div class="mb-4 w-1/2">
                <label class="block text-black">
                    {{ __('From') }}
                    <input
                        wire:model="from"
                        type="text"
                        id="from"
                        class="hw-dt mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                </label>

                @error('from') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4 w-1/2">
                <label class="block text-black">
                    {{ __('To') }}
                    <input
                        wire:model="to"
                        type="text"
                        id="to"
                        class="hw-dt mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                        required>
                </label>

                @error('to') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
            </div>
        </div>

        <!-- Emergency Contact -->
        <div class="mb-4">
            <label class="block text-black">
                {{ __('Contact number in emergency') }}
                <input
                    wire:model="emergency_contact"
                    type="text"
                    id="emergencyContact"
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    required>
            </label>

            @error('emergency_contact') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
        </div>

        <!-- Collapsible Section: Company Pay -->
        <details class="group border rounded-lg p-4 transition-all duration-300 overflow-hidden">
            <summary class=" font-semibold cursor-pointer text-xl group-open:text-blue-600">Company Pay</summary>
            <div class="mt-4 space-y-4">
                <label class="block text-black">
                    {{ __('Paid Leave') }} {{ __('(days)') }}
                    <input
                        wire:model="paid_leave"
                        type="number"
                        min="0"
                        step="0.25"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('paid_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Reason') }}
                    <input
                        wire:model="reason_company_pay"
                        type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('reason_company_pay') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="flex items-center text-black">
                    <input wire:model="child_under_12"
                           type="checkbox"
                           class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-200">
                    {{ __('Child under 12 months (1 hour early/day)') }}
                </label>
                @error('child_under_12') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black font-semibold">Paid Personal Leave:</label>
                <label class="flex items-center text-black">
                    <input
                        wire:model="self_marriage"
                        type="checkbox"
                        class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-200">
                    {{ __('Marriage (03 days)') }}
                </label>
                @error('self_marriage') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="flex items-center text-black">
                    <input
                        wire:model="child_marriage"
                        type="checkbox"
                        class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-200">
                    {{ __("Children’s marriage (01 day)") }}
                </label>
                @error('child_marriage') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="flex items-center text-black">
                    <input
                        wire:model="grand_funeral"
                        type="checkbox"
                        class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-200">
                    {{ __("Grandparent/ Sibling’s Funeral Leave (01 day)") }}
                </label>
                @error('grand_funeral') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="flex items-center text-black">
                    <input
                        wire:model="parent_funeral"
                        type="checkbox"
                        class="mr-2 rounded border-gray-300 text-indigo-600 focus:ring-indigo-200">
                    {{ __("Parent/ Children’s Funeral Leave (03 days)") }}
                </label>
                @error('parent_funeral') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
            </div>
        </details>

        <!-- Collapsible Section: Social Insurance Pay -->
        <details class="border rounded-lg p-4">
            <summary class="font-semibold cursor-pointer text-xl group-open:text-blue-600">Social Insurance Pay</summary>
            <div class="mt-4 space-y-4">
                <label class="block text-black">
                    {{ __('Pregnancy Check (days)') }}
                    <input
                        wire:model="pregnancy_check"
                        type="number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('pregnancy_check') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Maternity Leave (days)') }}
                    <input
                        wire:model="maternity_leave"
                        type="number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('maternity_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Paternity Leave (days)') }}
                    <input
                        wire:model="paternity_leave"
                        type="number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('paternity_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Other Leave (days)') }}
                    <input
                        wire:model="other_insurance_leave"
                        type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('other_insurance_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Reason') }}
                    <input
                        wire:model="reason_insurance"
                        type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('reason_insurance') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __('Sick Leave (days)') }}
                    <input
                        wire:model="sick_leave"
                        type="number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('sick_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror

                <label class="block text-black">
                    {{ __("Child's Sick Leave (days)") }}
                    <input
                        wire:model="child_sick_leave"
                        type="number"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('child_sick_leave') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
            </div>
        </details>

        <!-- Collapsible Section: Unpaid Leave -->
        <details class="border rounded-lg p-4">
            <summary class="font-semibold cursor-pointer text-xl group-open:text-blue-600">Unpaid Personal Leave</summary>
            <div class="mt-4">
                <label class="block text-black">
                    {{ __('Reason for unpaid leave') }}
                    <input
                        wire:model="unpaid_reason"
                        type="text"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                </label>
                @error('unpaid_reason') <span class="mt-2 text-sm text-red-600 dark:text-red-500">{{ $message }}</span> @enderror
            </div>
        </details>

        <!-- Submit -->
        <div class="flex items-center justify-between">
            <button
                type="submit"
                class="w-full bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                wire:target="submit"
                wire:loading.attr="disabled"
                wire:loading.class="opacity-50"
            >
                <span wire:loading.remove wire:target="submit">{{ __("Submit") }}</span>
                <span wire:loading wire:target="submit">{{ __("Processing....") }}</span>
            </button>
        </div>

        <style>
            .input-style {
                @apply mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50;
            }
        </style>
    </form>

</div>
