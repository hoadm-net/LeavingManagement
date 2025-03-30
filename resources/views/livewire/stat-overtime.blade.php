<div>
    <div class="mb-6">
{{--        Nav--}}
        <div class="max-w mx-auto bg-white p-6 rounded">
            <div class="grid grid-cols-1 gap-6 sm:grid-cols-2">
                <div>
                    <label for="begin" class="block text-sm font-medium text-gray-700">{{ __("Start Time") }}</label>
                    <input
                        wire:model.live="begin"
                        type="date"
                        id="begin"
                        name="begin"
                        class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="end" class="block text-sm font-medium text-gray-700">{{ __("End Time") }}</label>
                    <input
                        wire:model.live="end"
                        type="date" id="end" name="end" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                </div>
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700">{{ __("Status") }}</label>
                    <select
                        wire:model.live="status"
                        id="status" name="status" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">{{ __("All") }}</option>
                        <option value="pending">{{ __("Pending") }}</option>
                        <option value="processing">{{ __("Processing") }}</option>
                        <option value="approved">{{ __("Approved") }}</option>
                        <option value="rejected">{{ __("Rejected") }}</option>
                    </select>
                </div>
                <div>
                    <label for="department" class="block text-sm font-medium text-gray-700">{{ __("Department") }}</label>
                    <select
                        wire:model.live="department"
                        id="department" name="department" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <option value="">{{ __("All") }}</option>
                        @foreach($departments as $dep)
                            <option value="{{ $dep->id }}">{{ $dep->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="flex space-x-4">
                    <button
                        class="bg-gray-500 w-full text-white px-4 py-2 rounded hover:bg-gray-600"
                        wire:click="clear()"
                        wire:loading.attr="disabled"
                    >{{ __("Clear") }}</button>
                    <button
                        class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600"
                        wire:click="export()"
                        wire:loading.attr="disabled"
                    >{{ __("Export") }}</button>
                </div>
            </div>
        </div>
    </div>
    <div>
{{--        Content--}}
        <div class="overflow-x-auto">
            <table class="min-w-full border-collapse bg-white ">
                <thead>
                <tr>
                    <th class="px-6 py-4 text-left font-bold text-black border-b">#</th>
                    <th class="px-6 py-4 text-left font-bold text-black border-b">{{ __("Full Name") }}</th>
                    <th class="px-6 py-4 text-left font-bold text-black border-b">{{ __("Start Time") }}</th>
                    <th class="px-6 py-4 text-left font-bold text-black border-b">{{ __("End Time") }}</th>
                    <th class="px-6 py-4 text-left font-bold text-black border-b">{{ __("Status") }}</th>
                </tr>
                </thead>
                <tbody>
                @foreach($overtimes as $ot)
                <tr class="odd:bg-gray-100 even:bg-white hover:bg-gray-200">
                    <td class="px-6 py-4 border-b">{{ $ot->id }}</td>
                    <td class="px-6 py-4 border-b">{{ $ot->name }} ({{ $ot->department->name }})</td>
                    <td class="px-6 py-4 border-b">{{ date('d-m-Y H:i', strtotime($ot->begin)) }}</td>
                    <td class="px-6 py-4 border-b">{{ date('d-m-Y H:i', strtotime($ot->end)) }}</td>
                    <td class="px-6 py-4 border-b"><span class="capitalize">{{ $ot->status }}</span></td>
                </tr>
                @endforeach
                </tbody>
            </table>

            <div class="mt-6">
                {{ $overtimes->links() }}
            </div>
        </div>
    </div>
</div>
