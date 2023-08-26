<?php

namespace App\Http\Livewire\Admin;

use App\Models\Jabatan;
use Livewire\Component;

class JabatanTrased extends Component
{
    public $selectAll = false;
    public $selectedItems = [];
    public $data;
    public $jabatan, $deskripsi, $idJabatan;

    // Validasi
    protected $rules = [
        'jabatan' => 'required',
        'deskripsi' => 'required',
    ];

    // Kontrol Seleksi data dari checklist
    public function UpdateselectAll()
    {
        if ($this->selectAll) {
            $this->selectedItems = $this->data->pluck('id')->toArray();
        } else {
            $this->selectedItems = [];
        }
    }
    // Kontrol Restore Data
    public function restoreSelected()
    {
        $restoredItems = Jabatan::onlyTrashed()
            ->whereIn('id', $this->selectedItems)
            ->get();

        foreach ($restoredItems as $item) {
            // Mengembalikan data dengan menggunakan restore()
            $item->restore();
        }

        $this->selectedItems = [];
        $this->refreshData();

        toastr()->success("Selected data has been restored successfully!");
    }
    public function edit($id)
    {
        $jabatan = $this->data->firstwhere('id', $id);
        $this->jabatan = $jabatan->jabatan;
        $this->deskripsi = $jabatan->deskripsi;
        $this->idJabatan = $jabatan->id;
    }

    // Fungsi Ubah Data
    public function ubah()
    {
        $this->validate([
            'jabatan' => 'required',
            'deskripsi' => 'required'
        ]);
        $data = $this->data->firstWhere('id', $this->idJabatan);
        $data->jabatan = $this->jabatan;
        $data->deskripsi = $this->deskripsi;
        $data->save();
        toastr()->success('Data has been updated successfully!');
        $this->resetFields();
        $this->refreshData();
        $this->data = Jabatan::onlyTrashed()->get();
    }

    // Tools Dan Pemanggilan Data
    public function mount()
    {
        $this->data = Jabatan::onlyTrashed()->get();
    }

    public function render()
    {
        return view('livewire.admin.jabatan-trased');
    }
    private function resetFields()
    {
        $this->jabatan = '';
        $this->deskripsi = '';
        $this->idJabatan = '';
    }
    private function refreshData()
    {
        $this->data = Jabatan::onlyTrashed()->get();
        $this->selectAll = False;
        $this->selectedItems = [];
    }
}
