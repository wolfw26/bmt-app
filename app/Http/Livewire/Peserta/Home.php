<?php

namespace App\Http\Livewire\Peserta;

use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        return view('livewire.peserta.home')->extends('laypeserta', ['title' => 'Peserta']);
    }
}
