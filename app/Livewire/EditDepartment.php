<?php

namespace App\Livewire;

use App\Models\Department;
use Livewire\Component;

class EditDepartment extends Component
{
    public Department $department;
    public string $name;
    public int $max_level;
    public ?string $description = null;

    public function render()
    {
        $this->name = $this->department->name;
        $this->description = $this->department->description;
        $this->max_level = $this->department->max_level;

        return view('livewire.edit-department');
    }

    public function submit() {
        $this->validate([
            'name' => 'required|unique:departments,name,' . $this->department->id,
            'description' => 'nullable',
            'max_level' => 'required|numeric|min:1',
        ]);

        if ($this->name != $this->department->name) {
            $this->department->name = $this->name;
        }

        if ($this->description != null) {
            if ($this->description != $this->department->description) {
                $this->department->description = $this->description;
            }
        }

        $this->department->max_level = $this->max_level;
        $this->department->save();
        return redirect('department');
    }

    public function removeUser(string $uid) {
        $this->department->users()->detach($uid);
    }
}
