<?php

namespace App\Livewire;

use App\Models\Department;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ShowDepartments extends DataTableComponent
{
    protected $model = Department::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
        return route('edit-department', ['id' => $row]);
    });
    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Name', 'name')->searchable(),
            Column::make('Description', 'description')
        ];
    }

}
