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
                    <li>Position: {{ $ticket->position }}</li>
                    <li>Shift: {{ $ticket->shift }}</li>
                    <li>Department: {{ $ticket->department->name }}</li>
                    <li>Estimated time for leave: {{ $ticket->leave_days }}</li>
                    <li>From: {{ $ticket->from }}</li>
                    <li>To: {{ $ticket->to }}</li>
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
                    class="bg-blue-500 w-full text-white px-4 py-2 rounded hover:bg-blue-600">
                    {{ __("Agree") }}
                </button>

                <!-- Nút màu đỏ -->
                <button
                    wire:click="deny()"
                    wire:loading.attr="disabled"
                    wire:confirm="{{ __('Are you sure you want to reject this application?') }}"
                    class="bg-red-500 w-full text-white px-4 py-2 rounded hover:bg-red-600">
                    {{ __("Reject") }}
                </button>
            </div>

        </div>
    </main>
</div>
