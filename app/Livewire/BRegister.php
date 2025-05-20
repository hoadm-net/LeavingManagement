<?php

namespace App\Livewire;

use App\Mail\RequestCreated;
use App\Models\Department;
use App\Models\Leaving;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Livewire\WithFileUploads;


class BRegister extends Component
{
    use WithFileUploads;
    public $file;
    public $name;
    public $email;
    public $department;


    protected $rules = [
        'file' => 'required|mimes:xlsx,csv,xls|max:2048',
        'name' => 'required',
        'email' => 'required|email',
        'department' => 'required',
    ];

    public function render()
    {
        return view('livewire.b-register', [
            'departments' => Department::all()
        ]);
    }

    public function save() {
        $userKey = 'submit_lock_' . request()->ip(); // nếu có login thì dùng auth()->id()

        if (Cache::has($userKey)) {
            $this->addError('submit', 'Vui lòng đợi vài giây trước khi thử lại.');
            return;
        }

        // Đặt khóa trong 5 giây
        Cache::put($userKey, true, now()->addSeconds(5));
        
        try {
            $this->validate();

            $formattedBegin = Carbon::now()->format('Y-m-d H:i:s');
            $formattedEnd = Carbon::now()->addDays(1)->format('Y-m-d H:i:s');
            $dep = Department::find($this->department);

            $filePath = $this->file->storePublicly('uploads', 'public');

            $leaving = Leaving::create([
                'full_name' => $this->name,
                'email' => $this->email,
                'position' => '_',
                'shift' => '_',
                'department_id' => $this->department,
                'leave_days' => 1,
                'from' => $formattedBegin,
                'to' => $formattedEnd,
                'paid_leave' => 1,
                'reason_company_pay' => '',
                'child_under_12' => 0,
                'self_marriage' => 0,
                'child_marriage' => 0,
                'grand_funeral' => 0,
                'parent_funeral' => 0,
                'pregnancy_check' => 0,
                'maternity_leave' => 0,
                'paternity_leave' => 0,
                'other_insurance_leave' => 0,
                'reason_insurance' => 0,
                'sick_leave' => 0,
                'child_sick_leave' => 0,
                'unpaid_reason' => '_',
                'emergency_contact' => '_',
                'current_manager' => 1,
                'file_name' => $filePath
            ]);

            foreach ($dep->users as $manager) {
                if (!$manager->isActive()) {
                    continue;
                }

                if ($manager->pivot->level == 1) {
                    Mail::to($manager->email)->send(new RequestCreated($leaving));
                }
            }

            return redirect('thanks');

        } catch (Exception $e) {
            info($e->getMessage());
        }

        return redirect('thanks');
    }
}
