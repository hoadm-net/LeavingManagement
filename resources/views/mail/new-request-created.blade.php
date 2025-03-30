<div>
    <h3>Overtime Information</h3>
    <ul>
        <li>Full Name: {{ $Name }}</li>
        <li>Department: {{ $Department }}</li>
        <li>Shift: {{ $Shift }}</li>
        <li>Start Time: {{ $Start }}</li>
        <li>End Time: {{ $End }}</li>
        <li>Job Description: {{ $Description  }}</li>
        <li>Company Bus: {{ $Bus }}</li>
    </ul>

    <p style="color: #1d4ed8">{{ __("A new overtime request requires approval.") }} <a href="{{ route('dashboard') }}" target="_blank">{{ __("Please log in to the system to review it.") }}</a></p>
</div>
