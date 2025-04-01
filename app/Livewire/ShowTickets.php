<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\Leaving;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;
use Rappasoft\LaravelLivewireTables\Views\Column;
class ShowTickets extends DataTableComponent
{
    protected $model = Leaving::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('view-ticket', ['id' => $row]);
            });
        $this->setDefaultSort('id', 'desc');
        $this->setLayout('livewire.show-tickets');

    }

    public function filters(): array
    {
        return [
            SelectFilter::make('Status', 'status')
                ->options([
                    '' => 'All',
                    'pending' => 'Pending',
                    'processing' => 'Processing',
                    'approved' => 'Approved',
                    'rejected' => 'Rejected',
                ])->filter(function(Builder $builder, string $value) {
                    if ($value === 'pending') {
                        $builder->where('status', 'pending');
                    } elseif ($value === 'processing') {
                        $builder->where('status', 'processing');
                    } elseif ($value === 'approved') {
                        $builder->where('status', 'approved');
                    } elseif ($value === 'rejected') {
                        $builder->where('status', 'rejected');
                    }
                }),

            SelectFilter::make('Department', 'department_id')
                ->options(['' => 'All'] + Department::all()->pluck('name', 'id')->toArray())
                ->filter(function(Builder $builder, string $value) {
                    return $builder->where('department_id', $value);
                })
        ];
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Full Name', 'full_name')->searchable(),
            Column::make('Time for leave', 'leave_days'),
            Column::make('Department', 'department.name'),
            Column::make('From', 'from'),
            Column::make('To', 'to'),
            Column::make('Status', 'status')
                ->format(function($value, $row) {
                    $color = 'black';
                    if ($value === 'approved') {
                        $color = 'green';
                    } else if ($value === 'rejected') {
                        $color = 'red';
                    } else if ($value === 'processing') {
                        $color = 'blue';
                    }

                    return "<span class='capitalize text-".$color."-500'>".$value."</span>";
                })->html(),
        ];
    }
}
