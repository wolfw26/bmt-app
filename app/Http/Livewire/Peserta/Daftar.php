<?php

namespace App\Http\Livewire\Peserta;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;

class Daftar extends Component
{

    public $name;
    public $email;
    public $password;

    public function register()
    {
        $this->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'role' => 'peserta',
        ]);

        toastr()->success('Berhasil Mendaftar');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.peserta.daftar')->extends('laylogin', ['title' => 'DAFTAR PESERTA']);
    }
    private function resetData(){
        $this->name = '';
        $this->email = '';
        $this->password = '';
    }
}
