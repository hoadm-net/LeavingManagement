<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use LivewireUI\Modal\ModalComponent;

class CreateUser extends ModalComponent
{
    public $mail;
    public $name;
    public $password;
    public $password_confirmation;
    public $role;

    protected $rules = [
        'mail' => 'required|email',
        'name' => 'required',
        'password' => 'confirmed|min:8',
        'role' => 'required',
    ];

    public function submit()
    {
        $this->validate();
        User::create([
            'email' => $this->mail,
            'name' => $this->name,
            'password' => Hash::make($this->password),
            'role' => $this->role,
        ]);

        return $this->redirect('/manager');
    }

    public function render()
    {
        return view('livewire.create-user');
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

}
