<?php

namespace App\Models;

use Illuminate\Database\Eloquent\SoftDeletes;
// use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Petugas extends Authenticatable
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'id_petugas';

    protected $fillable = [
    'nama_petugas',
    'username',
    'password',
    'email',
    'telp',
    'level'];

    public function tanggapan()
    {
        return $this->belongsTo(Tanggapan::class, 'id_petugas');
    }
    
}
