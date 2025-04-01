<?php

namespace App\Livewire;

use App\Exports\TicketExport;
use App\Models\Department;
use App\Models\Leaving;
use Livewire\Component;
use Livewire\WithPagination;

class StatTicket extends Component
{
    use WithPagination;


    public $begin = null;
    public $end = null;
    public $status = null;
    public $department = null;

    public function render()
    {
        $query = Leaving::query();

        if ($this->begin) {
            $query->whereDate('from', '>=', $this->begin);
        }

        if ($this->end) {
            $query->whereDate('to', '<=', $this->end);
        }

        if ($this->department) {
            $query->where('department_id', $this->department);
        }

        if ($this->status != '') {
            $query->where('status', $this->status);
        }

        $tickets = $query->paginate(10);


        return view('livewire.stat-ticket', [
            'departments' => Department::all(),
            'tickets' => $tickets,
        ]);
    }

    public function clear() {
        $this->begin = null;
        $this->end = null;
        $this->status = null;
        $this->department = null;
    }

    public function export() {
        return (new TicketExport($this->begin, $this->end, $this->status, $this->department))
            ->download('leave_applications.xlsx');
    }
}
