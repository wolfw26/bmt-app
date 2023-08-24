<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Jabatan extends Model
{
    use HasFactory;

    protected $table = 'jabatan';
    protected $guard = ['id'];

    public function jabatanPeserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
