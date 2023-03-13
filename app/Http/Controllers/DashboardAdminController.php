<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use App\Models\Pengaduan;
use App\Models\Petugas;
use Illuminate\Http\Request;

class DashboardAdminController extends Controller
{
    public function index()
    {
        $masyarakat = Masyarakat::all()->count();
        $petugas = Petugas::where('level', 'petugas')->count();
        $pengaduan = Pengaduan::orderBy('created_at', 'DESC')->simplePaginate(5);
        $semua = Pengaduan::all()->count();
        $proses = Pengaduan::where('status', 'proses')->count();
        $selesai = Pengaduan::where('status', 'selesai')->count();
        // dd($petugas);
        return view('contents.admin.index', compact('masyarakat', 'petugas', 'semua', 'proses', 'selesai', 'pengaduan'));
    }

    
}