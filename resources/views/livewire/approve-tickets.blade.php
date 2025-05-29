<div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-300">
            <thead>
            <tr class="bg-blue-500 text-white">
                <th class="px-6 py-3 text-left">#</th>
                <th class="px-6 py-3 text-left">{{ __("Full Name") }}</th>
                <th class="px-6 py-3 text-left">{{ __("Position") }}</th>
                <th class="px-6 py-3 text-left">{{ __("Shift") }}</th>
                <th class="px-6 py-3 text-left">{{ __("Time for leave (days)") }}</th>
                <th class="px-6 py-3 text-left">{{ __("From") }}</th>
                <th class="px-6 py-3 text-left">{{ __("To") }}</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($tickets as $t)
                <tr class="border-b hover:bg-blue-200">
                    <td class="px-6 py-4">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4">{{ $t->full_name }} ({{ $t->department->name }}) </td>
                    <td class="px-6 py-4">{{ $t->position }}</td>
                    <td class="px-6 py-4">{{ $t->shift }}</td>
                    <td class="px-6 py-4">{{ $t->leave_days + 0 }}</td>
                    <td class="px-6 py-4">{{ $t->from }}</td>
                    <td class="px-6 py-4">{{ $t->to }}</td>
                    <td class="px-6 py-4">
                        <button
                            class="mr-4 bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600 focus:ring focus:ring-green-300 transition duration-200"
                            wire:click="$dispatch('openModal', { component: 'check-ticket', arguments: { tid: {{ $t->id }} }})"
                        >Approve</button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $tickets->links() }}
        </div>
    </div>
</div>
