<div>
    <main class="mt-6">
        <div class="grid lg:grid-cols-1 px-8 pt-6 pb-8">


            <div>
                <h2 class="text-xl text-blue-500 mb-4">{{ __("Leave Application Information") }}</h2>

                <ul>
                    <li>Full Name: {{ $ticket->full_name }}</li>
                    @if ($ticket->email)
                        <li>Email: {{ $ticket->email }}</li>
                    @endif

                    @if(!$ticket->file_name)
                    <li>Position: {{ $ticket->position }}</li>
                    <li>Shift: {{ $ticket->shift }}</li>
                    @endif

                    <li>Department: {{ $ticket->department->name }}</li>

                    @if($ticket->file_name)
                        <li>
                            <a class="text-orange-500" href="{{ Storage::url($ticket->file_name)  }}" download>
                                View attached file
                                <svg
                                    class="inline-block h-5 w-5 text-orange-500"
                                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.375 19.5h17.25m-17.25 0a1.125 1.125 0 0 1-1.125-1.125M3.375 19.5h7.5c.621 0 1.125-.504 1.125-1.125m-9.75 0V5.625m0 12.75v-1.5c0-.621.504-1.125 1.125-1.125m18.375 2.625V5.625m0 12.75c0 .621-.504 1.125-1.125 1.125m1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125m0 3.75h-7.5A1.125 1.125 0 0 1 12 18.375m9.75-12.75c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125m19.5 0v1.5c0 .621-.504 1.125-1.125 1.125M2.25 5.625v1.5c0 .621.504 1.125 1.125 1.125m0 0h17.25m-17.25 0h7.5c.621 0 1.125.504 1.125 1.125M3.375 8.25c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125m17.25-3.75h-7.5c-.621 0-1.125.504-1.125 1.125m8.625-1.125c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125M12 10.875v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 10.875c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125M13.125 12h7.5m-7.5 0c-.621 0-1.125.504-1.125 1.125M20.625 12c.621 0 1.125.504 1.125 1.125v1.5c0 .621-.504 1.125-1.125 1.125m-17.25 0h7.5M12 14.625v-1.5m0 1.5c0 .621-.504 1.125-1.125 1.125M12 14.625c0 .621.504 1.125 1.125 1.125m-2.25 0c.621 0 1.125.504 1.125 1.125m0 1.5v-1.5m0 0c0-.621.504-1.125 1.125-1.125m0 0h7.5" />
                                </svg>
                            </a>
                        </li>
                    @endif

                    @if(!$ticket->file_name)
                    <li>Estimated time for leave: {{ $ticket->leave_days }}</li>
                    <li>From: {{ $ticket->from }}</li>
                    <li>To: {{ $ticket->to }}</li>
                    @endif
                </ul>

                <div style="margin-top: 20px;">
                    <h3 class="text-lg text-black font-bold">Company pay</h3>
                    <table class="w-full">
                        <tr>
                            <td style="width: 50%;">@if($ticket->paid_leave) ✅ @else ❌ @endif Paid leave: {{ $ticket->paid_leave }} (days)</td>
                            <td>@if($ticket->self_marriage) ✅ @else ❌ @endif Marriage (03 days)</td>
                        </tr>
                        <tr>
                            <td>Reason: {{ $ticket->reason_company_pay }}</td>
                            <td>@if($ticket->child_marriage) ✅ @else ❌ @endif Children’s marriage (01 day)</td>
                        </tr>
                        <tr>
                            <td>@if($ticket->child_under_12) ✅ @else ❌ @endif Child under 12 months (1 hour early/day)</td>
                            <td>@if($ticket->grand_funeral) ✅ @else ❌ @endif Grandparent/ Sibling’s Funeral Leave (01 day)</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>@if($ticket->parent_funeral) ✅ @else ❌ @endif Parent/ Children’s Funeral Leave (03 days)</td>
                        </tr>
                    </table>
                </div>

                <div style="margin-top: 15px;">
                    <h3 class="text-lg text-black font-bold">Social Insurance pay</h3>
                    <table class="w-full">
                        <tr>
                            <td style="width: 50%;"><strong>Maternity Leave</strong></td>
                            <td><strong>Sick Leave</strong></td>
                        </tr>
                        <tr>
                            <td>@if($ticket->pregnancy_check) ✅ @else ❌ @endif Pregnancy Check: {{ $ticket->pregnancy_check }} (days)</td>
                            <td>@if($ticket->sick_leave) ✅ @else ❌ @endif Sick leave: {{ $ticket->sick_leave }} (days)</td>
                        </tr>
                        <tr>
                            <td>@if($ticket->maternity_leave) ✅ @else ❌ @endif Maternity Leave: {{ $ticket->maternity_leave }} (days)</td>
                            <td>@if($ticket->child_sick_leave) ✅ @else ❌ @endif Children’s sick leave: {{ $ticket->child_sick_leave }} (days)</td>
                        </tr>
                        <tr>
                            <td>@if($ticket->paternity_leave) ✅ @else ❌ @endif Paternity Leave: {{ $ticket->paternity_leave }} (days)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>@if($ticket->other_insurance_leave) ✅ @else ❌ @endif Other: {{ $ticket->other_insurance_leave }} (days)</td>
                            <td></td>
                        </tr>
                        <tr>
                            <td>Reason: {{ $ticket->reason_insurance }}</td>
                            <td></td>
                        </tr>
                    </table>
                </div>

                <div style="margin-top: 15px;">
                    <h3 class="text-lg text-black font-bold">Unpaid Personal Leave</h3>
                    <p>Reason: {{ $ticket->unpaid_reason }}</p>
                </div>
            </div>

            @if(count($ticket->logs) > 0)
               <div class="mt-4">
                   <h2 class="text-xl text-blue-500 mb-4">{{ __("Activity Logs") }}</h2>
                   <table class="w-full">
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
                       @foreach($ticket->logs as $log)
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
               </div>
            @endif

            <hr class="mb-4">
            <h2 class="text-xl text-blue-500 mb-4">{{ __("Leave Application Request Approval") }}</h2>

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
                    wire:loading.class="opacity-50"
                    class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">

                    <span wire:loading.remove wire:target="approve">{{ __("Agree") }}</span>
                    <span wire:loading wire:target="approve">{{ __("Processing....") }}</span>
                </button>

                <!-- Nút màu đỏ -->
                <button
                    wire:click="deny()"
                    wire:loading.attr="disabled"
                    wire:confirm="{{ __('Are you sure you want to reject this application?') }}"
                    class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600"
                    wire:loading.class="opacity-50"
                >


                    <span wire:loading.remove wire:target="deny">{{ __("Reject") }}</span>
                    <span wire:loading wire:target="deny">{{ __("Processing....") }}</span>
                </button>
            </div>

        </div>
    </main>
</div>
