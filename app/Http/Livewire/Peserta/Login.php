<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;

class Login extends Component
{
    public function render()
    {
        return view('livewire.peserta.login')->extends('laylogin', ['title' => 'Log in']);
    }
}
