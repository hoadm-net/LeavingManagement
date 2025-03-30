<div>
    <main class="mt-6">
        <div class="grid lg:grid-cols-1 px-8 pt-6 pb-8">

            <h2 class="text-xl text-blue-500 mb-4">{{ __("Overtime Information") }}</h2>
            <ul class="ml-6 mb-4 list-disc">
                <li><strong>{{ __("Full Name") }}: </strong> {{ $overtime->name }}</li>
                @if ($overtime->email)
                    <li><strong>{{ __("Email") }}: </strong> {{ $overtime->email }}</li>
                @endif
                <li><strong>{{ __("Department") }}: </strong> {{ $overtime->department->name }}</li>
                <li><strong>{{ __("Shift") }}: </strong> {{ $overtime->shift }}</li>
                <li><strong>{{ __("Start Time") }}: </strong> {{ date('d-m-Y H:i:s', strtotime($overtime->begin)) }}</li>
                <li><strong>{{ __("End Time") }}: </strong> {{ date('d-m-Y H:i:s', strtotime($overtime->end)) }}</li>
                <li><strong>{{ __("Job Description") }}: </strong> {{ $overtime->description }}</li>
                <li><strong>{{ __("Company Bus") }}: </strong>
                    @if($overtime->bus)
                        <svg class="inline-block h-5 w-5 text-green-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                    @else
                        <svg class="inline-block h-5 w-5 text-red-500" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true" data-slot="icon">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z"></path>
                        </svg>
                    @endif
                </li>
                @if($overtime->file_name)
                    <li>
                        <a class="text-orange-500" href="{{ Storage::url($overtime->file_name)  }}" download>
                            View attached file
                            <svg
                                class="inline-block h-5 w-5 text-orange-500"
                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                            </svg>
                        </a>
                    </li>
                @endif
            </ul>

            @if(count($overtime->logs) > 0)
                <h2 class="text-xl text-blue-500 mb-4">{{ __("Activity Logs") }}</h2>
                <table>
                    <thead class="border-b-2 font-bold">
                        <tr>
                            <td>#</td>
                            <td>Manager</td>
                            <td>Decision</td>
                            <td>Notes</td>
                            <td>Time</td>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($overtime->logs as $log)
                         <tr class="border-b">
                             <td>{{ $loop->index + 1 }}</td>
                             <td>{{ $log->user->name }}</td>
                             <td class="capitalize">{{ $log->action }}</td>
                             <td>{{ $log->notes }}</td>
                             <td>{{ $log->created_at }}</td>
                         </tr>
                    @endforeach
                    </tbody>
                </table>
            @endif

            <hr class="mb-4">
            <h2 class="text-xl text-blue-500 mb-4">{{ __("Overtime Request Approval") }}</h2>

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
                    wire:click="approve()"
                    wire:loading.attr="disabled"
                    class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">
                    {{ __("Agree") }}
                </button>

                <!-- Nút màu đỏ -->
                <button
                    wire:click="deny()"
                    wire:loading.attr="disabled"
                    wire:confirm="Bạn có chắc muốn từ chối đơn này?"
                    class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600">
                    {{ __("Reject") }}
                </button>
            </div>

        </div>
    </main>
</div>
