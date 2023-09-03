<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\DataUsers;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class Profil extends Component
{
    use WithFileUploads;

    public $isEdit = false;
    public $isData = False;
    public $fotoUp, $foto_ktpUp;
    public $foto, $foto_ktp;
    public $nama, $no_rek = '-', $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama = '-', $no_telp, $alamat, $status = '-';
    public $user;

    protected $rules = [
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'tgl_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'no_telp' => 'required|numeric',
        'alamat' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function trueEdit()
    {
        $this->isEdit = True;
    }

    public function mount()
    {
        $this->resetData();
    }

    public function render()
    {

        $data = DataUsers::where('users_id', Auth::user()->id)->first();
        if ($data) {
            $this->isData = True;
        } else {
            $this->isData = False;
        }
        $this->user = Auth::user()->id;
        return view('livewire.admin.profil')
            ->extends('layouts', ['title' => 'ADMIN || PROFIL'])
            ->section('content');
    }

    public function Create()
    {
        $data = $this->validate();
        $data['agama'] = $this->agama;
        $data['status'] = $this->status;
        $data['no_rek'] = $this->no_rek;
        // Unggah foto baru Jika Ada
        $foto = $this->fotoUp->store(null, 'admin_foto');
        $data['foto'] = 'storage/admin/foto/' . $foto;
        $this->hapusFotoLama('foto');

        // Unggah foto KTP baru Jika Ada
        $foto_ktp = $this->foto_ktpUp->store(null, 'admin_foto_ktp');
        $data['foto_ktp'] = 'storage/admin/foto_ktp/' . $foto_ktp;
        $this->hapusFotoLama($foto_ktp);

        $data['users_id'] = Auth::user()->id;
        $save = DataUsers::create($data);

        if ($save) {
            $this->resetData();
            toastr()->success('Data berhasil disimpan');
        } else {
            $this->resetData();
            toastr()->warning('Data gagal disimpan');
        }
    }


    public function Edit()
    {
        $data = $this->validate();
        $data['agama'] = $this->agama;
        $data['status'] = $this->status;
        $data['no_rek'] = $this->no_rek;
        // Unggah foto baru Jika Ada
        $this->unggahFoto('foto', 'admin_foto', $data, 'fotoUp');
        $this->unggahFoto('foto_ktp', 'admin_foto_ktp', $data, 'foto_ktpUp');


        $dataUsers = DataUsers::where('users_id', Auth::user()->id)->first();
        if (Gate::authorize('updateAdmin', $dataUsers)) {
            $dataUsers->update($data);
            $this->resetData();
            toastr()->success('Data Berhasil diubah');
        } else {
            $this->resetData();
            toastr()->warning('Anda Tidak Memiliki Ijin untuk melakukan Perubahan Data ini !!');
        }
    }

    private function unggahFoto($field, $disk, &$data, $fileAttribute)
    {
        if ($this->$fileAttribute) {
            $path = $this->$fileAttribute->store(null, $disk);
            $data[$field] = 'storage/admin/' . $field . '/' . $path;
            $this->hapusFotoLama($field);
        }
    }
    private function hapusFotoLama($field)
    {
        if ($this->user) {
            $dataUser = DataUsers::where('users_id', $this->user)->first();
            if ($dataUser && $dataUser->{$field}) {
                Storage::disk("admin_{$field}")->delete($dataUser->{$field});
            }
        }
    }

    private function resetData()
    {
        $this->isEdit = False;
        $user = Auth::user()->id;
        $dataUsers = DataUsers::where('users_id', $user)->first();

        if ($dataUsers) {
            $this->nama = $dataUsers->nama;
            $this->no_rek = $dataUsers->no_rek;
            $this->tempat_lahir = $dataUsers->tempat_lahir;
            $this->tgl_lahir = $dataUsers->tgl_lahir;
            $this->jenis_kelamin = $dataUsers->jenis_kelamin;
            $this->agama = $dataUsers->agama;
            $this->no_telp = $dataUsers->no_telp;
            $this->status = $dataUsers->status;
            $this->alamat = $dataUsers->alamat;
            $this->foto = $dataUsers->foto;
            $this->foto_ktp = $dataUsers->foto_ktp;
        } else {
            // Atur nilai default atau kosong untuk variabel public
            $this->nama = '';
            $this->no_rek = '';
            $this->tempat_lahir = '';
            $this->tgl_lahir = '';
            $this->jenis_kelamin = '';
            $this->agama = '';
            $this->no_telp = '';
            $this->status = '';
            $this->alamat = '';
        }
    }
}
