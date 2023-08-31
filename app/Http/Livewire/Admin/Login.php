<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;

class Login extends Component
{

    public $email;
    public $password;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required|min:6',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Login()
    {
        $credentials = $this->validate();

        if (Auth::attempt($credentials)) {
            session()->regenerate();
            $this->resetData();
            toastr()->success('Berhasil login');
            return redirect()->route('admin.jabatan');
        }

        toastr()->warning('Email atau kata sandi yang diberikan tidak cocok dengan data kami.');
        $this->password = '';
    }


    public function render()
    {

        return view('livewire.admin.login')->extends('laylogin', ['title' => 'Admin || Login']);
    }

    private function resetData()
    {
        $this->email = '';
        $this->password = '';
    }
}
