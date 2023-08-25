<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jabatan extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'jabatan';
    protected $guarded = ['id'];

    public function jabatanPeserta()
    {
        return $this->hasMany(Peserta::class);
    }
}
