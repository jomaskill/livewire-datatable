<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';
    public string $password_confirmation = '';

    protected $rules = [
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|min:8|confirmed'
    ];

    public function submit()
    {
        $this->validate();

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password)
        ]);
    }

    public function updatedPassword($field)
    {
        $this->validate(['password' => 'min:8']);
    }

    public function render()
    {
        return view('livewire.register');
    }
}
