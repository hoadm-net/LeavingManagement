<?php

namespace App\Exports;

use App\Models\Leaving;
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
class TicketExport implements FromQuery, WithHeadings, WithMapping
{
    use Exportable;

    public $begin;
    public $end;
    public $status;
    public $department;

    public function __construct($begin, $end, $status, $department)
    {
        $this->begin = $begin;
        $this->end = $end;
        $this->status = $status;
        $this->department = $department;
    }
    public function query()
    {
        $query = Leaving::query();

        if ($this->begin) {
            $query->whereDate('begin', '>=', $this->begin);
        }

        if ($this->end) {
            $query->whereDate('end', '<=', $this->end);
        }

        if ($this->department) {
            $query->where('department_id', $this->department);
        }

        if ($this->status != '') {
            $query->where('status', $this->status);
        }

        return $query;
    }

    public function headings(): array
    {
        return [
            '#',
            'Full Name',
            'Email',
            'Shift',
            'Position',
            'Department',
            'Time for leave',
            'From',
            'To',
            'Status',
        ];
    }

    public function map($ticket): array
    {
        return [
            $ticket->id,
            $ticket->full_name,
            $ticket->email,
            $ticket->shift,
            $ticket->position,
            $ticket->department->name,
            $ticket->leave_days,
            Carbon::createFromFormat('Y-m-d H:i:s', $ticket->from)->format('d-m-Y H:i'),
            Carbon::createFromFormat('Y-m-d H:i:s', $ticket->to)->format('d-m-Y H:i'),
            ucfirst($ticket->status),
        ];
    }
}
