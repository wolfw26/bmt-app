<?php

namespace App\Http\Livewire\Admin;


use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class MasterAdmin extends Component
{
    public $data;
    public function render()
    {
        $this->data = User::with('userData')->get();
        return view('livewire.admin.master-admin')->extends('layouts', ['title' => 'Admin aktif']);
    }
}
