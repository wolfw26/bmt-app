<?php

namespace App\Models;

use App\Models\DocUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DataUsers extends Model
{
    use HasFactory;
    protected $table = 'data_users';
    protected $guarded = ['id'];


    public function dataUsersDoc()
    {
        return $this->hasMany(DocUser::class);
    }
    public function dataUsersUser()
    {
        return $this->belongsTo(User::class);
    }
}
