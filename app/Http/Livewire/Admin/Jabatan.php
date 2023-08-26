<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jabatan as Jb;
use Livewire\Component;

class Jabatan extends Component
{
    public $showJabatanTrashed = false;
    public $modal = '';
    public $selectAll = false;
    public $selectedItems = [];
    public $data;
    public $jabatan,$deskripsi,$idJabatan;


// Validasi
    protected $rules = [
        'jabatan' => 'required',
        'deskripsi' => 'required',
    ];

// Kontrol Button Trased
    public function showTrashed()
    {
        $this->showJabatanTrashed = true;
    }

    public function backToJabatan()
    {
        $this->showJabatanTrashed = false;
    }

// Kontrol modal untuk edit / Tambah
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

// panggil fungsi sesuai jenis modal yang di buka
    public function submitForm()
    {
        if ($this->modal === 'add') {
            $this->create();
        } elseif ($this->modal === 'edit') {
            $this->ubah();
        }
    }

// Kontrol Seleksi data dari checklist
    public function UpdateselectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->data->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }

// Fungsi Update Status
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

//Hapus 1 atau lebih Data
    public function deleteSelected()
    {
        $deletedItems = Jb::whereIn('id', $this->selectedItems)->get();

        $deletedCount = $deletedItems->count();

        foreach ($deletedItems as $item) {
            $itemInfo[] = $item->jabatan;

            $item->status = "non-active";
            $item->save();
        }
        // Kode delete dengan softDelete
        Jb::whereIn('id', $this->selectedItems)->delete();

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

// Fungsi Tambah Data
    public function create()
    {

        $this->validate();

        $data = new Jb();
        $data->jabatan = $this->jabatan;
        $data->deskripsi = $this->deskripsi;
        $data->save();
        toastr()->success('Data has been saved successfully!');
        $this->resetFields();
        $this->data = Jb::latest()->get();
    }

// Fungsi Ubah Data
    public function ubah()
    {
        $this->validate();
        $data = Jb::find($this->idJabatan);
        $data->jabatan = $this->jabatan;
        $data->deskripsi = $this->deskripsi;
        $data->save();
        toastr()->success('Data has been updated successfully!');
        $this->resetFields();
        $this->data = Jb::latest()->get();
    }

// Tools dan Pemanggilan Data Dari DB:
    public function mount()
    {
        $this->data = Jb::latest()->get();
    }
    public function render()
    {
        $this->data = Jb::latest()->get();
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
        $this->data = Jb::latest()->get();
        $this->selectAll = False;
        $this->selectedItems = [];
    }
}
