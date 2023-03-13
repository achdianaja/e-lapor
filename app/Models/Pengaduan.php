<?php

namespace App\Models;

use App\Models\Images;
use App\Models\Tanggapan;
use App\Models\Masyarakat;
use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pengaduan extends Model
{
    use HasFactory;

    protected $table = 'pengaduan';

    protected $primaryKey = 'id_pengaduan';

    protected $fillable = [
    'tgl_pengaduan',
    'nik',
    'judul_laporan',
    'isi_laporan',
    'lokasi_kejadian',
    'hide_identitas',
    'hide_laporan',
    'id_categories',
    'foto',
    'status',
    'report_main_image',
];

    protected $dates = ['tgl_pengaduan'];

    public function user ()
    {
        return $this->hasOne(Masyarakat::class,'nik','nik');
    }

    public function images()
    {
        return $this->hasMany(Images::class, 'id_pengaduan');
    }

    public function tanggapan()
    {
        return $this->hasOne(Tanggapan::class, 'id_pengaduan');
    }

    public function categories()
    {
        return $this->hasOne(Categories::class, 'id_pengaduan');
    }

    public function getCreatedAtAttribute()
    {
        return Carbon::parse($this->attributes['created_at'])
        ->translatedFormat('H:i');
    }
}
