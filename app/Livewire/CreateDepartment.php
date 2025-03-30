<?php

namespace App\Livewire;

use App\Models\Department;
use LivewireUI\Modal\ModalComponent;

class CreateDepartment extends ModalComponent
{
    public $name;
    public $max_level;
    public $description;

    protected $rules = [
        'name' => 'required|unique:departments,name',
        'max_level' => 'required|numeric|min:1',
        'description' => 'nullable',
    ];

    public function submit()
    {
        $this->validate();

        Department::create([
            'name' => $this->name,
            'max_level' => $this->max_level,
            'description' => $this->description,
        ]);

        return $this->redirect('/department');
    }

    public function render()
    {
        return view('livewire.create-department');
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }
}
