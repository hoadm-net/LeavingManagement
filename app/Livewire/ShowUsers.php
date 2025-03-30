<?php

namespace App\Livewire;

use App\Models\User;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;


class ShowUsers extends DataTableComponent
{

    protected $model = User::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('edit-manager', ['id' => $row]);
            });
        $this->setDefaultSort('id', 'desc');
        $this->setLayout('livewire.show-users');
//        $this->setPerPageAccepted([2, 10, 25, 50, 100]);

    }

    public function columns(): array
    {
        return [
            Column::make('ID', 'id'),
            Column::make('Full Name', 'name')->searchable(),
            Column::make('Email', 'email')->searchable(),
            Column::make('Role', 'role')
                ->format(function($value, $row) {
                    if ($value == 'su') {
                        return "Super User";
                    } elseif ($value == 'hr') {
                        return "HR Staff";
                    } elseif ($value == 'manager') {
                        return "Manager";
                    } elseif ($value == 'bod') {
                        return "Board of Directors";
                    }
                }),
            BooleanColumn::make('Status', 'active'),

        ];
    }
}
