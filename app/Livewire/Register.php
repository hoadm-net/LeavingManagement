<?php

namespace App\Livewire;

use App\Mail\RequestCreated;
use App\Models\Department;
use App\Models\Overtime;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;

class Register extends Component
{
    public $name;
    public $email;
    public $department;
    public $begin;
    public $end;
    public $description;
    public $urgent = false;
    public $bus = false;
    public $shift;


    protected $rules = [
        'name' => 'required',
        'email' => 'required|email',
        'department' => 'required',
        'begin' => 'required',
        'end' => 'required|after:begin',
        'description' => 'nullable',
        'urgent' => 'required',
        'bus' => 'required',
        'shift' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.register', [
            'departments' => Department::all()
        ]);
    }

    public function submit() {

        $this->validate();

        $formattedBegin = Carbon::createFromFormat('d-m-Y H:i', $this->begin)->format('Y-m-d H:i:s');
        $formattedEnd = Carbon::createFromFormat('d-m-Y H:i', $this->end)->format('Y-m-d H:i:s');

        $dep = Department::find($this->department);
        $current_manager = 1;
        if ($this->urgent) {
            $current_manager = $dep->max_level;
        }
        $staffs = explode(PHP_EOL, $this->name);

        foreach ($staffs as $staff) {
            $staff = trim($staff);
            if (! empty($staff)) {
                $overtime = Overtime::create([
                    'name' => mb_convert_case($staff, MB_CASE_TITLE, "UTF-8"),
                    'email' => $this->email,
                    'department_id' => $this->department,
                    'begin' => $formattedBegin,
                    'end' => $formattedEnd,
                    'description' => $this->description,
                    'status' => 'pending',
                    'bus' => $this->bus,
                    'shift' => $this->shift,
                    'current_manager' => $current_manager
                ]);
            }
        }

        foreach ($dep->users as $manager) {
            if (!$manager->isActive()) {
                continue;
            }

            if ($manager->pivot->level == $current_manager) {
                Mail::to($manager->email)->send(new RequestCreated($overtime));
            }

        }

        return redirect('thanks');
    }


}
