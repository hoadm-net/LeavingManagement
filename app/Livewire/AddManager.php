<?php

namespace App\Livewire;

use App\Models\Department;
use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class AddManager extends ModalComponent
{
    public Department $department;
    public string $user;
    public int $level;

    protected array $rules = [
        'user' => 'required',
        'level' => 'required|integer|min:1',
    ];

    public function render()
    {
        $users = User::whereNotIn('id', $this->department->users->pluck('id'))->get();
        return view('livewire.add-manager', [
            'users' => $users
        ]);
    }

    public static function modalMaxWidth(): string
    {
        return '2xl';
    }

    public function submit()
    {
        $this->validate();
        $this->department->users()->attach($this->user, ['level' => $this->level]);

        return redirect()->route('edit-department', $this->department);
    }

}
