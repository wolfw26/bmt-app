<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
    public $email, $password;

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

        $valid = $this->validate();
        if (Auth::attempt($valid)) {
            session()->regenerate();
            $this->resetData();
            toastr()->success('Berhasil login');
            return redirect()->route('peserta.home');
        }

        toastr()->warning('Gagal Masuk, Periksa Kembali E-mail dan Password anda ');
        $this->password = '';
    }
    public function render()
    {
        return view('livewire.peserta.login')->extends('laylogin', ['title' => 'Log in']);
    }

    private function resetData()
    {
        $this->email = '';
        $this->password = '';
    }
}
