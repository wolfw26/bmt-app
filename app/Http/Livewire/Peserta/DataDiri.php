<?php

namespace App\Http\Livewire\Peserta;

use App\Models\Peserta;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class DataDiri extends Component
{
    use WithFileUploads;


    public $fotoUp, $foto_ktpUp;
    public $foto, $foto_ktp;
    public $nama, $nik, $tempat_lahir, $tgl_lahir, $jenis_kelamin, $agama = '-', $no_telp, $alamat, $status = '-';
    public $user;
    public $peserta;

    protected $rules = [
        'nama' => 'required',
        'tempat_lahir' => 'required',
        'nik' => 'required|min:6',
        'tgl_lahir' => 'required|date',
        'jenis_kelamin' => 'required',
        'no_telp' => 'required|numeric',
        'alamat' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function Simpan()
    {

        $data = $this->validate();

        // Simpan foto baru jika diunggah
        if ($this->fotoUp) {
            $fotoPath = $this->fotoUp->store(null, 'peserta_foto');
            $data['foto'] = 'storage/peserta/foto/' . $fotoPath;

            // Hapus foto lama jika ada
            $this->hapusFotoLama('foto');
        }

        // Simpan foto KTP baru jika diunggah
        if ($this->foto_ktpUp) {
            $fotoKTPPath = $this->foto_ktpUp->store(null, 'peserta_foto_ktp');
            $data['foto_ktp'] = 'storage/peserta/foto_ktp/' . $fotoKTPPath;

            // Hapus foto KTP lama jika ada
            $this->hapusFotoLama('foto_ktp');
        }

        $data['agama'] = $this->agama;
        $data['status'] = $this->status;

        if (Peserta::where('users_id', $this->user)->exists()) {
            $peserta = Peserta::where('users_id', $this->user)->first();
            if (Gate::authorize('updatePeserta', $peserta)) {
                $peserta->update($data);
                toastr()->success('Data Berhasil diubah');
                $this->resetData();
            } else {
                toastr()->warning('Anda Tidak Memiliki Ijin untuk melakukan Perubahan Data ini !!');
                $this->resetData();
            }
        } else {
            $data['users_id'] = $this->user;
            $save = Peserta::create($data);

            if ($save) {
                toastr()->success('Data berhasil disimpan');
                $this->resetData();
            } else {
                toastr()->warning('Data gagal disimpan');
                $this->resetData();
            }
        }
    }
    public function mount()
    {
        $this->resetData();
    }

    public function render()
    {
        $user = Auth::user()->id;
        $data = Peserta::where('users_id', $user)->first();
        // @dd($this->peserta);
        $this->user = Auth::user()->id;
        return view('livewire.peserta.data-diri')
            ->extends('laypeserta', ['title' => 'DATA DIRI']);
    }

    private function resetData()
    {
        $user = Auth::user()->id;
        $peserta = Peserta::where('users_id', $user)->first();

        if ($peserta) {
            $this->nama = $peserta->nama;
            $this->nik = $peserta->nik;
            $this->tempat_lahir = $peserta->tempat_lahir;
            $this->tgl_lahir = $peserta->tgl_lahir;
            $this->jenis_kelamin = $peserta->jenis_kelamin;
            $this->agama = $peserta->agama;
            $this->no_telp = $peserta->no_telp;
            $this->status = $peserta->status;
            $this->alamat = $peserta->alamat;
            $this->foto = $peserta->foto;
            $this->foto_ktp = $peserta->foto_ktp;
        } else {
            // Atur nilai default atau kosong untuk variabel public
            $this->nama = '';
            $this->nik = '';
            $this->tempat_lahir = '';
            $this->tgl_lahir = '';
            $this->jenis_kelamin = '';
            $this->agama = '';
            $this->no_telp = '';
            $this->status = '';
            $this->alamat = '';
        }
    }
    private function hapusFotoLama($field)
    {
        if ($this->user) {
            $peserta = Peserta::where('users_id', $this->user)->first();
            if ($peserta && $peserta->{$field}) {
                Storage::disk("peserta_{$field}")->delete($peserta->{$field});
            }
        }
    }
}
