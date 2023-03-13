<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;

use Illuminate\Foundation\Auth\User as Authenticatable;

class Masyarakat extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'masyarakat';

    protected $primaryKey = 'nik';

    protected $dates =['delete_at'];

    protected $fillable = [
        'nik',
        'nama',
        'username',
        'alamat',
        'email',
        'password',
        'telp',
        'tgl_lahir',
        'gender',
        'foto'
    ];


}
