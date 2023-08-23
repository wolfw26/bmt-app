<?php

namespace App\Models;

use App\Models\Peserta;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocPeserta extends Model
{
    use HasFactory;

    protected $table = 'doc_peserta';
    protected $guard = ['id'];


    public function docPeserta()
    {
        return $this->belongsTo(Peserta::class);
    }
}
