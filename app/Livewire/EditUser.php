<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;


class EditUser extends Component
{

    public User $user;
    public ?string $password = null;
    public string $password_confirmation;
    public string $role;
    public bool $active;


    protected $rules = [
        'password' => 'nullable|min:8|confirmed',
        'active' => 'boolean',
        'role' => 'required'
    ];

    public function render()
    {
        $this->role = $this->user->role;
        $this->active = $this->user->active;

        return view('livewire.edit-user');
    }

    public function submit() {
        $this->validate();

        $this->user->active = $this->active;
        $this->user->save();

        if ($this->role != $this->user->role) {
            $this->user->role = $this->role;
            $this->user->save();
        }

        if ($this->password) {
            $this->user->password = Hash::make($this->password);
            $this->user->save();
        }

        return redirect('manager');
    }
}
