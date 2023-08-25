<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jabatan as Jb;
use Livewire\Component;

class Jabatan extends Component
{
    public $modal = '';
    public $selectAll = false;
    public $selectedItems = [];
    public $data;
    public $jabatan;
    public $deskripsi;
    public $idJabatan;

    protected $rules = [
        'jabatan' => 'required',
        'deskripsi' => 'required',
    ];
    public function modalType($type, $id)
    {
        $this->modal = $type;
        if ($type == 'edit' && $id != Null) {
            $data = Jb::find($id);
            $this->jabatan = $data->jabatan;
            $this->deskripsi = $data->deskripsi;
            $this->idJabatan = $data->id;
        } else {
            $this->jabatan = '';
            $this->deskripsi = '';
        }
    }
    public function submitForm()
    {
        if ($this->modal === 'add') {
            $this->create();
        } elseif ($this->modal === 'edit') {
            $this->ubah();
        }
    }
    public function UpdateselectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->data->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }
    public function updateStatus($status)
    {
        Jb::whereIn('id', $this->selectedItems)->update(['status' => $status]);
        if ($this->selectAll) {
            toastr()->success("All Status {$status} updated successfully!");
        } else {
            toastr()->success("Status {$status} updated successfully!");
        }
        $this->selectedItems = [];
        $this->refreshData();
    }
    public function deleteSelected()
    {
        $deletedItems = Jb::whereIn('id', $this->selectedItems)->get();

        $deletedCount = $deletedItems->count();

        foreach ($deletedItems as $item) {
            $itemInfo[] = $item->jabatan; // Ubah ini sesuai dengan kolom yang ingin Anda tampilkan
        }

        Jb::whereIn('id', $this->selectedItems)->forceDelete();

        if ($deletedCount > 0) {
            $deletedList = implode(', ', $itemInfo);
            toastr()->success("Data $deletedList has been deleted successfully!");
        } else {
            toastr()->info("No data deleted.");
        }

        $this->selectedItems = [];
        $this->refreshData();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function create()
    {

        $this->validate();

        $data = new Jb();
        $data->jabatan = $this->jabatan;
        $data->deskripsi = $this->deskripsi;
        $data->save();
        toastr()->success('Data has been saved successfully!');
        $this->resetFields();
        $this->data = Jb::all();
    }
    public function ubah()
    {
        $this->validate();
        $data = Jb::find($this->idJabatan);
        $data->jabatan = $this->jabatan;
        $data->deskripsi = $this->deskripsi;
        $data->save();
        toastr()->success('Data has been updated successfully!');
        $this->resetFields();
        $this->data = Jb::all();
    }
    public function mount()
    {
        $this->data = Jb::All();
    }
    public function render()
    {
        return view('livewire.admin.jabatan')->extends('layouts', ['title' => 'JABATAN']);
    }
    private function resetFields()
    {
        $this->jabatan = '';
        $this->deskripsi = '';
        $this->id = '';
    }
    private function refreshData()
    {
        $this->data = Jb::all();
        $this->selectAll = False;
        $this->selectedItems = [];
    }
}
