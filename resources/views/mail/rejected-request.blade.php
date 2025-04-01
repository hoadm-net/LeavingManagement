<div>
    <p>
        <strong style="{{ $Style }}">{{ $Status }}</strong>
    </p>

    <h2>Leave Application Information</h2>
    <ul>
        <li>Full Name: {{ $full_name }}</li>
        @if ($email)
            <li>Email: {{ $email }}</li>
        @endif
        <li>Position: {{ $position }}</li>
        <li>Shift: {{ $shift }}</li>
        <li>Department: {{ $department }}</li>
        <li>Estimated time for leave: {{ $leave_days }}</li>
        <li>From: {{ $from }}</li>
        <li>To: {{ $to }}</li>
    </ul>

    <div style="margin-top: 20px;">
        <h3>Company pay</h3>
        <table style="border: none;">
            <tr>
                <td style="width: 50%;">@if($paid_leave) ✅ @else ❌ @endif Paid leave: {{ $paid_leave }} (days)</td>
                <td>@if($self_marriage) ✅ @else ❌ @endif Marriage (03 days)</td>
            </tr>
            <tr>
                <td>Reason: {{ $reason_company_pay }}</td>
                <td>@if($child_marriage) ✅ @else ❌ @endif Children’s marriage (01 day)</td>
            </tr>
            <tr>
                <td>@if($child_under_12) ✅ @else ❌ @endif Child under 12 months (1 hour early/day)</td>
                <td>@if($grand_funeral) ✅ @else ❌ @endif Grandparent/ Sibling’s Funeral Leave (01 day)</td>
            </tr>
            <tr>
                <td></td>
                <td>@if($parent_funeral) ✅ @else ❌ @endif Parent/ Children’s Funeral Leave (03 days)</td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 15px;">
        <h3>Social Insurance pay</h3>
        <table style="border: none;">
            <tr>
                <td style="width: 50%;"><strong>Maternity Leave</strong></td>
                <td><strong>Sick Leave</strong></td>
            </tr>
            <tr>
                <td>@if($pregnancy_check) ✅ @else ❌ @endif Pregnancy Check: {{ $pregnancy_check }} (days)</td>
                <td>@if($sick_leave) ✅ @else ❌ @endif Sick leave: {{ $sick_leave }} (days)</td>
            </tr>
            <tr>
                <td>@if($maternity_leave) ✅ @else ❌ @endif Maternity Leave: {{ $maternity_leave }} (days)</td>
                <td>@if($child_sick_leave) ✅ @else ❌ @endif Children’s sick leave: {{ $child_sick_leave }} (days)</td>
            </tr>
            <tr>
                <td>@if($paternity_leave) ✅ @else ❌ @endif Paternity Leave: {{ $paternity_leave }} (days)</td>
                <td></td>
            </tr>
            <tr>
                <td>@if($other_insurance_leave) ✅ @else ❌ @endif Other: {{ $other_insurance_leave }} (days)</td>
                <td></td>
            </tr>
            <tr>
                <td>Reason: {{ $reason_insurance }}</td>
                <td></td>
            </tr>
        </table>
    </div>

    <div style="margin-top: 15px;">
        <h3>Unpaid Personal Leave</h3>
        <p>Reason: {{ $unpaid_reason }}</p>
    </div>

</div>
