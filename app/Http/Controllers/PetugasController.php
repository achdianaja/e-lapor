<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Images;
use App\Models\Petugas;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PetugasController extends Controller
{
    public function show()
    {
        $petugas = Petugas::where('id_petugas', '!=', Auth::guard('admin')->user()->id_petugas)->get();

        return view('contents.admin.petugasshow', compact('petugas'));
    }

    public function myAccount()
    {
        $petugas = Petugas::all()->first();
        $tanggapan = Tanggapan::where('id_petugas', Auth::guard('admin')->user()->id_petugas)->count();
        return view('contents.admin.myAccount', compact('petugas', 'tanggapan') );
    }

    public function createOrUpdate(Request $request)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$request->id_pengaduan)->first();

        $tanggapan = Tanggapan::where('id_pengaduan',$request->id_pengaduan)->first();

        if ($tanggapan) {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan->update([
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            // dd($request);

            return redirect('/admin/detailpengaduan/'. $pengaduan->id_pengaduan)->with('success','Tanggapan berhasil diubah');
        } else {
            $pengaduan->update(['status' => $request->status]);

            $tanggapan = Tanggapan::create([
                'id_pengaduan' => $request->id_pengaduan,
                'tgl_tanggapan' => date('Y-m-d'),
                'tanggapan' => $request->tanggapan,
                'id_petugas' => Auth::guard('admin')->user()->id_petugas,
            ]);
            
            return redirect('/admin/detailpengaduan/'. $pengaduan->id_pengaduan)->with('success','Tanggapan berhasil dikirim');
        }
    }

    public function add()
    {
        return view ('contents.admin.addpetugas');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        // $validate = Validator::make($data, [
        //     'nama_petugas' => 'required|string|max:255',
        //     'username' => 'required|string|unique:petugas',
        //     'password' => 'required|string|min:6',
        //     'telp' => 'required',
        //     'level' => 'required|in:admin,petugas'
        // ]);

        // if ($validate->fails()) {
        //     return back()->withErrors($validate);
        // }

        $username = Petugas::where('username', $data['username'])->first();

        if ($username) {
            return back()->with(['username' => 'Username sudah digunakan !']);
        }

        // dd($data['email']);

        Petugas::create([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],

        ]);

        return redirect('/admin/petugas')->with('success', 'Data berhasil ditambahkan');
    }

    public function edit($id_petugas)
    {
        $petugas = Petugas::where('id_petugas', $id_petugas)->first();

        return view ('contents.admin.editpetugas',compact('petugas'));
    }

    public function update(Request $request, $id_petugas)
    {
        $data = $request->all();

        $petugas = Petugas::find($id_petugas);

        $petugas->update([
            'nama_petugas' => $data['nama_petugas'],
            'username' => $data['username'],
            'password' => Hash::make($data['password']),
            'telp' => $data['telp'],
            'level' => $data['level'],
        ]);

        return redirect('/admin/petugas')->with('success','Data Petugas Berhasil Diubah');
    }

    public function delete($id_petugas)
    {
        $petugas = Petugas::findOrFail($id_petugas);

        $petugas->delete();

        return redirect('/admin/petugas')->with('success','Petugas berhasil dihapus');
    }

    public function restore($id_petugas)
    {
        $petugas = Petugas::onlyTrashed()->findOrFail($id_petugas);

        $petugas->restore();
        return redirect('/admin/petugas')->with('success', 'Berhasil dikembalika');

    }

    public function trash()
    {
        $petugas = Petugas::onlyTrashed()->get();

        return view('contents.admin.trash', compact('petugas'));
    }

    public function forcepetugas($id_petugas)
    {
        $petugas = Petugas::onlyTrashed()->findOrFail($id_petugas);
        $petugas->forceDelete();
        return redirect('/admin/trash')->with('success', 'Berhasil dihapus secara permanen.');
    }

    public function detail($id_petugas)
    {
        $petugas = Petugas::where('id_petugas',$id_petugas)->first();

        return view('contents.admin.detailpetugas',compact('petugas'));
    }

    public function showLaporan()
    {
        $pengaduan = Pengaduan::all();
        return view('contents.admin.pengaduanshow', compact('pengaduan'));
    }

    public function detailpengaduan($id_pengaduan)
    {
        $pengaduan = Pengaduan::where('id_pengaduan',$id_pengaduan)->first();
        
        $tanggapan = Tanggapan::where('id_pengaduan', $id_pengaduan)->first();

        // $image = Images::where('id', $id)->first();

        return view('contents.admin.pengaduandetail',compact('pengaduan','tanggapan'));
    }

    public function kategori()
    {
        $kategori = Categories::orderBy('created_at', 'DESC')->get();
        return view('contents.admin.kategori', compact('kategori'));
    }

    public function addkategori(Request $request)
    {
        Categories::create([
            'name' => $request->name
        ]);

        return redirect()->back()->with('success', 'Berhasil di tambahkan');
    }

    public function kategoridelete($id)
    {
        $kategori = Categories::findOrFail($id);

        $kategori->delete();

        return redirect()->back()->with('success','Kategori berhasil dihapus');
    }
}
