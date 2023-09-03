<?php

namespace App\Models;

use App\Models\DataUsers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DocUser extends Model
{
    use HasFactory;

    protected $table = 'doc_users';
    protected $guarded = ['id'];


    public function docDataUser()
    {
        return $this->belongsTo(DataUsers::class);
    }
}
