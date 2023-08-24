<?php

namespace App\Models;

use App\Models\User;
use App\Models\Jabatan;
use App\Models\DocPeserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;

    protected $table = 'peserta';
    protected $guard = ['id'];

    public function pesertaJabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }
    public function pesertaUser()
    {
        return $this->belongsTo(User::class);
    }

    public function pesertaDoc()
    {
        return $this->hasMany(DocPeserta::class);
    }
}
