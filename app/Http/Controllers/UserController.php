<?php

namespace App\Http\Controllers;

use App\Models\Images;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\Categories;
use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $title = 'Home';
        $pengaduan = Pengaduan::all();
        return view('contents.user.index', compact('title', 'pengaduan'));
    }

    public function dashboard()
    {
        $title = 'Home';
        $masyarakat = Masyarakat::where('nik', Auth::guard('masyarakat')->user()->nik)->first();
        $categories = Categories::all();
        $foto = Auth::guard('masyarakat')->user()->foto;
        return view('contents.user.dashboard', compact('title', 'masyarakat', 'foto','categories'));
    }

    public function updateProfile(Request $request, $nik)
    {
        $validatedData = Validator::make($request->all(), [
            // 'foto' => 'required|image|mimes:jpg,png,jpeg|max:5000',
            // 'nik' => ['required'],
            'nama' => ['required'],
            'username' => ['required'],
            'email' => ['required'],
            'telp' => ['required'],
            'gender' => ['required'],
        ], [
            // 'foto.required' => 'foto harus diisi',
            // 'nik.required' => 'nik harus diisi',
            'gender.required' => 'gender harus diisi',
            'telp.required' => 'no tlp harus diisi',
            'username.required' => 'username harus diisi',
            'email.required' => 'email harus diisi'
        ]);
        
        if($validatedData->fails()){
            return redirect()->back()->withErrors($validatedData);
        }
        // dd($request->all());
        if($request->has('foto')){
            $fileName = time() . $request->file('foto')->getClientOriginalName();
            $path = $request->file('foto')->storeAs('foto-profile', $fileName);
            $foto = '/storage/' . $path;

            Masyarakat::where('nik', $nik)->update([
                'foto' => $foto,
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'telp' => $request->telp,
                'gender' => $request->gender,
            ]);
        } else {
            Masyarakat::where('nik', $nik)->update([
                'nama' => $request->nama,
                'username' => $request->username,
                'email' => $request->email,
                'telp' => $request->telp,
                'gender' => $request->gender,
            ]);
        }

        return redirect('/laporan')->with('pesanprofile', 'Profile berhasil diupdate');
    }


    public function profile($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();
        
        // dd($foto);[]
        
        $foto = Auth::guard('masyarakat')->user()->foto;
        return view('contents.user.profile', compact('masyarakat', 'foto'));
    }

    public function login(Request $request)
    {
        
        $user = Masyarakat::where(function($query) use ($request){
            $query->where('username', $request->inputan)
                  ->orWhere('telp', $request->inputan)
                  ->orWhere('email', $request->inputan);
        })->first();
    
        if ($user) {
            $password = Hash::check($request->password, $user->password);
        
            if (Auth::guard('masyarakat')->attempt([
                'username' => $user->username, 
                'password' => $request->password,
            ]) || Auth::guard('masyarakat')->attempt([
                'telp' => $user->telp, 
                'password' => $request->password,
            ]) || Auth::guard('masyarakat')->attempt([
                'email' => $user->email, 
                'password' => $request->password,
            ])) {
                return redirect('/dashboard');
            } else {
                return redirect()->back()->with(['pesan' => 'Password tidak ada tidak sesuai']);
            }
            if (!$password) {
                return redirect()->back()->with(['pesan' => 'Akun tidak sesuai']);
            }
        } else {
            return redirect()->back()->with(['pesan' => 'Username, nomor telepon, atau email tidak ditemukan']);
        }
    }

    public function formRegister()
    {
        return view('contents.auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->all();
        $cusMessage = [
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'password.min' => "Password minimal berisi 8 karakter",
            "password.required" => "Password harus di isi",
            "gender.required" => "Jenis kelaminharus di isi",
            "telp.required" => "Nomor tlp harus di isi",
            "telp.min" => "Nomor tlp harus lebih dari 12 karakter",
            "email.required" => "Email harus di isi",
            "email.email" => "Harus menggunakan @",
            "username.required" => "Username harus di isi",
            "nama.required" => "Nama harus di isi",
            "nik.required" => "NIK harus di isi",
            "nik.min" => "NIK minimal 16 karakter",
            "nik.max" => "NIK maksimal 16 karakter",
        ];

        $validated =  $request->validate([
            'nik' => ['required', 'min:16','max:16'],
            'nama' => ['required'],
            'username' => ['required'],
            'email' => ['required','email'],
            'telp' => ['required', 'min:12'],
            'gender' => ['required'],
            'password' => ['required','min:8', 'confirmed'],
        ], $cusMessage);

        // if ($validated->fails()) {
        //     return redirect()->back()->with(['pesan' => $validated->errors()]);
        // }


        $username = Masyarakat::where('username', $request->username)->first();
        // $nik = Masyarakat::where('nik', $request->nik)->first();

        if ($username) {
            return redirect()->back()->with(['pesan' => 'Username sudah terdaftar!']);
        }
        

        Masyarakat::create([
            'nik' => $data['nik'],
            'nama' => $data['nama'],
            'username' => $data['username'],
            'email' => $data['email'],
            'telp' => $data['telp'],
            'gender' => $data['gender'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect()->route('admin.formLogin');
    }

    public function logout()
    {
        Auth::guard('masyarakat')->logout();

        return redirect()->route('pekat.index');
    }

    public function storePengaduan(Request $request)
    {
        $cusMessage = [
            "judul_laporan.required" => "Judul harus di isi",
            "isi_laporan.required" => "isi laporan harus di isi",
            "images.required" => "Gambar harus di isi, minimal 1 gambar",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB",
            "tgl_pengaduan.required" => "tanggal pengaduan harus di isi",
            "lokasi_kejadian.required" => "Lokasi kejadian harus di isi" 
        ];
        // dd($request->images);
        $request->validate([
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'tgl_pengaduan'   => 'required',
            'lokasi_kejadian' => 'required',
            'images'  => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:20000'
        ], $cusMessage);

        // dd($request->all());
        date_default_timezone_set('Asia/Jakarta');
        DB::transaction(function() use($request){
            $pengaduan = Pengaduan::create([
                "nik" => Auth::guard('masyarakat')->user()->nik,
                "judul_laporan" => $request->judul_laporan,
                "isi_laporan" => $request->isi_laporan,
                "tgl_pengaduan" => Carbon::createFromFormat('d/m/Y', $request->tgl_pengaduan),
                "lokasi_kejadian" => $request->lokasi_kejadian,
                "id_categories" => $request->id_categories,
                "hide_identitas"  => $request->hide_identitas ?? '1',
                "hide_laporan"  => $request->hide_laporan ?? '1',
                "status" => '0',
                // "report_main_image" => $request->file('images')[0]->store('LaporanImages')
            ]);

            // dd($request);

            foreach($request->file('images') as $image){
                if($image->getClientOriginalName() == $request->file('images')[0]->getClientOriginalName()){
                    continue;
                }

                Images::create([
                    'image_name' => $image->getClientOriginalName(),
                    'image_size' => $image->getSize(),
                    'image_path' => $image->store('LaporanImages'),
                    'id_pengaduan'    => $pengaduan->id_pengaduan
                ]);
            }
        });
        return redirect()->route('pekat.laporan')->with('pesan', "Laporan berhasil terkirim!");
    }

    public function edit($id)
    {
        $judul_laporan = Pengaduan::where('judul_laporan', Auth::guard('masyarakat')->user()->judul_laporan);
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        $title = 'Home';      
        return view('contents.user.editlLaporan', compact('pengaduan', 'title'));
    }

    public function updatePengaduan(Request $request, $id)
    {
        $cusMessage = [
            "judul_laporan.required" => "Nama barang harus di isi",
            "isi_laporan.required" => "Harga awal harus di isi",
            // "image.required" => "Gambar harus di isi",
            "images.*.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "images.*.max" => "Ukuran maksimal gambar 2MB",
            "image.mimes" => "Format gambar harus berupa jpg, png, jpeg atau gif",
            "image.max" => "Ukuran maksimal gambar 2MB",
        ];
        // dd($request->images);
        $request->validate([
            'judul_laporan' => 'required',
            'isi_laporan' => 'required',
            'tgl_pengaduan'   => 'required',
            'lokasi_kejadian' => 'required',
            // 'images'  => 'required',
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:20000'
        ], $cusMessage);
        $id_pengaduan = Pengaduan::find($id);

        if($request->hasFile('image')){
            $request->validate([
                'image' => 'required|mimes:jpg,jpeg,png,gif|max:2048'
            ], );
            // $id_pengaduan->item_main_image !== null ? Storage::delete($id_pengaduan->item_main_image) : '';
            // $this->queryUpdateImages($request, $id_pengaduan);
            
        }else{
            Pengaduan::where('id_pengaduan', $id_pengaduan->id_pengaduan)->update([
                "nik" => Auth::guard('masyarakat')->user()->nik,
                "judul_laporan" => $request->judul_laporan,
                "isi_laporan" => $request->isi_laporan,
                "tgl_pengaduan" => date('Y-m-d'),
                "lokasi_kejadian" => $request->lokasi_kejadian,
                "hide_identitas"  => $request->hide_identitas ?? '1',
                "hide_laporan"  => $request->hide_laporan ?? '1',
                // "status" => '0',
                // "report_main_image" => $request->file('images')[0]->store('LaporanImages')
            ]);
        }


        if(isset($request->imagesDelete) && $request->file('images')){
            $request->validate([
            'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
            ], );

            $data = Images::where('id', $request->imagesDelete)->get();
            foreach ($data as $value) {
                Storage::delete($value->image_path);
            }
            $this->queryDeleteImages($request->imagesDelete);
            foreach($request->file('images') as $image){
                Images::create([
                    "image_name" => $image->getClientOriginalName(),
                    "image_size" => $image->getSize(),
                    "image_path" => $image->store('itemImages'),
                    "id_pengaduan"    => $id_pengaduan->id_pengaduan
                ]);
            }
        }elseif(isset($request->imagesDelete) && !$request->file('images')){
            $myImages = Images::where('id', $request->imagesDelete)->get();
            foreach($myImages as $image){
                Storage::delete($image->image_path);
            }
            // dd('hallo');
            $this->queryDeleteImages($request->imagesDelete);
        }elseif($request->file('images') && !$request->imagesDelete){
            $request->validate([
                'images.*' => 'mimes:jpg,jpeg,png,gif|max:2000'
            ], );
            foreach($request->file('images') as $image){
                Images::create([
                    "image_name" => $image->getClientOriginalName(),
                    "image_size" => $image->getSize(),
                    "image_path" => $image->store('itemImages'),
                    "id_pengaduan"    => $id_pengaduan->id_pengaduan
                ]);
            }
        }
        // dd($request->all());
        return redirect()->route('pekat.detailLaporan', $id)->with('message', 'Data barang berhasil diubah');
    }

    public function queryDeleteImages($images)
    {
        foreach ($images as $image) {
            Images::where('id', $image)->delete();
        }
    }

    public function laporan()
    {
        $status = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->first();

        $title = 'Home';
        $foto = Auth::guard('masyarakat')->user()->foto;

        $semua = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik]])->count();
        $selesai = Pengaduan::where([['nik', Auth::guard('masyarakat')->user()->nik], ['status', 'selesai']])->count();
        $masyarakat = Masyarakat::where('nik', Auth::guard('masyarakat')->user()->nik)->first();
        $pengaduan = Pengaduan::where('nik', Auth::guard('masyarakat')->user()->nik)->orderBy('tgl_pengaduan', 'desc')->get();
        return view('contents.user.laporan', ['pengaduan' => $pengaduan], compact('title', 'status', 'masyarakat', 'foto', 'selesai', 'semua'));
    }

    public function detail($id)
    {
        $pengaduan = Pengaduan::where('id_pengaduan', $id)->first();
        $foto = Auth::guard('masyarakat')->user()->foto;
        $tanggapan = Tanggapan::all()->first();
        $title = 'Home';      
        return view('contents.user.detailLapor', compact('pengaduan', 'title', 'tanggapan', 'foto'));
    }

    public function deleteimg($id)
    {
        $petugas = Images::findOrFail($id);

        $petugas->delete();

        return redirect()->route('pekat.detailLaporan')->with('pesan','foto berhasil dihapus');
    }

    public function destroy($id_pengaduan)
    {
        $pengaduan = Pengaduan::findOrFail($id_pengaduan);

        $pengaduan->delete();

        return redirect('/laporan')->with('pesanhapus','Laporan berhasil dihapus');
    }

    public function showPengaduan()
    {
        $pengaduan = Pengaduan::with('user')->get();

        return view('contents.user.pengaduan', compact('pengaduan'));
    }

    public function ubahpassword($nik)
    {
        $masyarakat = Masyarakat::where('nik', $nik)->first();
        return view('contents.user.ubahpassword', compact('masyarakat'));
    }

    public function updatePassword(Request $request, $nik)
    {
        $cusMessage = [
            'password.confirmed' => 'Password tidak sama dengan konfirmasi password',
            'password.min' => "Password minimal berisi 8 karakter",
            "password.required" => "Password harus di isi",
        ];

        $request->validate([
            'password' => 'required|min:8|confirmed'
        ], $cusMessage);

        Masyarakat::where('nik', $nik)->update([
            'password' => Hash::make($request['password'])
        ]);

        return redirect('/profile/', $nik)->with('pesan', 'Password berhasil di ubah');
    }
}