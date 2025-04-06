<?php

namespace App\Livewire;

use App\Mail\RequestCreated;
use App\Models\Department;
use App\Models\Leaving;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Validation\ValidationException;
use Livewire\Component;

class Register extends Component
{
    public $full_name;
    public $email;
    public $position;
    public $shift;
    public $department_id;
    public $leave_days;
    public $from;
    public $to;

    public $paid_leave = 0;
    public $reason_company_pay;
    public $child_under_12 = 0;

    public $self_marriage = 0;
    public $child_marriage = 0;
    public $grand_funeral = 0;
    public $parent_funeral = 0;

    public $pregnancy_check = 0;
    public $maternity_leave = 0;
    public $paternity_leave = 0;
    public $other_insurance_leave = 0;
    public $reason_insurance;
    public $sick_leave = 0;
    public $child_sick_leave = 0;

    public $unpaid_reason;
    public $emergency_contact;

    protected $rules = [
        'full_name' => 'required|string|max:255',
        'email' => 'nullable|string|email|max:255',
        'position' => 'required|string|max:255',
        'shift' => 'nullable|string|max:100',
        'department_id' => 'required|exists:departments,id',
        'leave_days' => 'required|integer|min:1',
        'from' => 'required|date',
        'to' => 'required|date|after:from',
        'paid_leave' => 'nullable|integer|min:0',
        'reason_company_pay' => 'nullable|string',
        'child_under_12' => 'nullable|integer|min:0',
        'self_marriage' => 'nullable|integer|min:0',
        'child_marriage' => 'nullable|integer|min:0',
        'grand_funeral' => 'nullable|integer|min:0',
        'parent_funeral' => 'nullable|integer|min:0',
        'pregnancy_check' => 'nullable|integer|min:0',
        'maternity_leave' => 'nullable|integer|min:0',
        'paternity_leave' => 'nullable|integer|min:0',
        'other_insurance_leave' => 'nullable|integer|min:0',
        'reason_insurance' => 'nullable|string',
        'sick_leave' => 'nullable|integer|min:0',
        'child_sick_leave' => 'nullable|integer|min:0',
        'unpaid_reason' => 'nullable|string',
        'emergency_contact' => 'required|string|min:8',
    ];

    public function render()
    {
        return view('livewire.register', [
            'departments' => Department::all()
        ]);
    }

    public function submit() {
        try {
            $this->validate();

            $formattedBegin = Carbon::createFromFormat('d-m-Y H:i', $this->from)->format('Y-m-d H:i:s');
            $formattedEnd = Carbon::createFromFormat('d-m-Y H:i', $this->to)->format('Y-m-d H:i:s');

            $leaving = Leaving::create([
                'full_name' => $this->full_name,
                'email' => $this->email,
                'position' => $this->position,
                'shift' => $this->shift,
                'department_id' => $this->department_id,
                'leave_days' => $this->leave_days,
                'from' => $formattedBegin,
                'to' => $formattedEnd,
                'paid_leave' => $this->paid_leave,
                'reason_company_pay' => $this->reason_company_pay,
                'child_under_12' => $this->child_under_12,
                'self_marriage' => $this->self_marriage,
                'child_marriage' => $this->child_marriage,
                'grand_funeral' => $this->grand_funeral,
                'parent_funeral' => $this->parent_funeral,
                'pregnancy_check' => $this->pregnancy_check,
                'maternity_leave' => $this->maternity_leave,
                'paternity_leave' => $this->paternity_leave,
                'other_insurance_leave' => $this->other_insurance_leave,
                'reason_insurance' => $this->reason_insurance,
                'sick_leave' => $this->sick_leave,
                'child_sick_leave' => $this->child_sick_leave,
                'unpaid_reason' => $this->unpaid_reason,
                'emergency_contact' => $this->emergency_contact,
                'current_manager' => 1
            ]);

            $dep = Department::find($this->department_id);

            foreach ($dep->users as $manager) {
                if (!$manager->isActive()) {
                    continue;
                }

                if ($manager->pivot->level == 1) {
                    Mail::to($manager->email)->send(new RequestCreated($leaving));
                }
            }

            return redirect('thanks');
        } catch (ValidationException $e) {
            $today = now()->format('d-m-Y H:i');
            $this->from = $today;
            $this->to = $today;

            // Để Livewire tiếp tục hiển thị lỗi
            throw $e;
        }
    }
}
