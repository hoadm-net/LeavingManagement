<div>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-blue-100 border border-blue-300">
            <thead>
                <tr class="bg-blue-500 text-white">
                    <th class="px-6 py-3 text-left">#</th>
                    <th class="px-6 py-3 text-left">{{ __("Full Name") }}</th>
                    <th class="px-6 py-3 text-left">{{ __("Start Time") }}</th>
                    <th class="px-6 py-3 text-left">{{ __("End Time") }}</th>
                    <th class="px-6 py-3 text-left">{{ __("Job Description") }}</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($overtimes as $ot)
                <tr class="border-b hover:bg-blue-200">
                    <td class="px-6 py-4">{{ $loop->index + 1 }}</td>
                    <td class="px-6 py-4">{{ $ot->name }} ({{ $ot->department->name }}) </td>
                    <td class="px-6 py-4">{{ $ot->begin }}</td>
                    <td class="px-6 py-4">{{ $ot->end }}</td>
                    <td class="px-6 py-4">{{ $ot->description }}</td>
                    <td class="px-6 py-4">
                        <button
                            class="mr-4 bg-green-500 text-white px-2 py-1 rounded-lg hover:bg-green-600 focus:ring focus:ring-green-300 transition duration-200"
                            wire:click="$dispatch('openModal', { component: 'check-overtime', arguments: { ot: {{ $ot->id }} }})"
                        >Approve</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <div class="mt-6">
            {{ $overtimes->links() }}
        </div>
    </div>
</div>
