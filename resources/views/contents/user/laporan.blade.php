@extends('layouts.user.master')


@section('title', 'PEKAT - Pengaduan Masyarakat')

@section('content')

{{-- Section Card --}}
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="card shadow">
                    <div class="card-body">
                        <div class="row ">
                            <div class="col-xl-3 text-center">
                                @if ($foto)
                                <img src="{{ asset($foto) }}"
                                    class="card-img img-fluid avatar-xl rounded-circle mx-3" alt="...">
                                @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                                <img src="/assets/images/avatar/girl.jpg"
                                    class="card-img img-fluid avatar-xl rounded-circle mx-3" alt="...">
                                @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                                <img src="/assets/images/avatar/man.jpg"
                                    class="card-img img-fluid avatar-xl rounded-circle mx-3" alt="...">
                                @endif
                            </div>
                            <div class="col-xl-4 ">
                                <h2 class="d-none d-lg-block text-start py-4">
                                    {{ Auth::guard('masyarakat')->user()->nama }}
                                </h2>
                                <h2 class="d-lg-none text-center">{{ Auth::guard('masyarakat')->user()->nama }}</h2>
                            </div>
                            <div class="col-xl-3 py-4 ">
                                <a href="/profile/{{ $masyarakat->nik }}"
                                    class="btn btn-outline-warning d-none d-lg-block">Ubah profile</a>
                                <a href="/profile/{{ $masyarakat->nik }}" class="btn btn-outline-warning d-lg-none form-control">Ubah profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        {{-- status laporan --}}
        <div class="row">
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <ul class="nav nav-tabs nav-justified nav-bordered mb-3">
                            <li class="nav-item">
                                <a href="{{ route('pekat.laporan') }}" class="nav-link {{ request('status') == null ? 'active' : '' }}">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Semua Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pekat.laporan', ['status' => 'proses']) }}" class="nav-link {{ request('status') == 'proses' ? 'active' : '' }}">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Proses</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pekat.laporan', ['status' => 'selesai']) }}" class="nav-link {{ request('status') == 'selesai' ? 'active' : ''}}">
                                    <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Selesai</span>
                                </a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane show active" id="home-b2">
                                @if ($pengaduan->isEmpty())
                                <div class="col-lg-12">
                                    <h6 class="text-center">Belum ada pengaduan</h6>
                                </div>
                                @else
                                @foreach ($pengaduan as $k => $v)
                                @if (request('status') && $v->status != request('status'))
                                 @continue
                                @endif
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                @if (Auth::guard('masyarakat')->user()->gender ==
                                                'laki_laki')
                                                <img src="/assets/images/avatar/man.jpg"
                                                    class="card-img img-fluid avatar-xs rounded-circle mx-3" alt="...">
                                                @endif
                                                @if (Auth::guard('masyarakat')->user()->gender ==
                                                'perempuan')
                                                <img src="/assets/images/avatar/girl.jpg"
                                                    class="card-img img-fluid avatar-xs rounded-circle mx-3" alt="...">
                                                @endif
                                            </div>
                                            <div class="col-lg-4">
                                                @if ($v->hide_laporan == 2)
                                                <p>Anonymous</p>
                                                @else
                                                <p>{{ $v->user->nama }}</p>
                                                @endif
                                            </div>
                                        </div>

                                        @if ($v->status == '0')
                                        <p class="text-danger">Pending</p>
                                        @elseif($v->status == 'proses')
                                        <p class="text-warning">{{ ucwords($v->status) }}
                                        </p>
                                        @else
                                        <p class="text-success">{{ ucwords($v->status) }}
                                        </p>
                                        @endif

                                        <p>{{ $v->tgl_pengaduan->format('d M, h:i') }}</p>
                                        <h2><a href="/laporan/{{ $v->id_pengaduan }}/detail">{{ $v->judul_laporan }}</a>
                                        </h2>

                                        <p>{{ Str::limit($v->isi_laporan, 100) }} <a
                                                href="/laporan/{{ $v->id_pengaduan }}/detail">Selengkapnya</a> </p>

                                        <img src="/storage/{{ $v->report_main_image }}"
                                            alt="{{ 'Gambar '.$v->judul_laporan }}" class="img-fluid avatar-md">

                                        {{-- @if ($v->tanggapan != null)
                                            <p class="mt-3 mb-1">
                                                {{ '*Tanggapan dari '. $v->tanggapan->petugas->nama_petugas }}
                                        </p>
                                        <p class="light">{{ $v->tanggapan->tanggapan }}</p>
                                        @endif --}}
                                    </div>
                                </div>
                                @endforeach
                                @endif
                            </div>
                        </div>
                    </div> <!-- end card-body -->
                </div> <!-- end card-->
            </div> <!-- end col -->
            {{-- end status laporan  --}}

            {{-- menu --}}
            <div class="col-xl-4">
                <div class="card shadow">
                    <div class="card-body">
                        <h5>Menu</h5>
                        <hr>
                        <a href="/profile/{{ $masyarakat->nik }}" class="text-dark">
                            <i class="mdi mdi-face-man my-2"></i>
                            <small>Ubah profile</small></a>
                        <hr>
                        <a href="/laporan" class="text-dark">
                            <i class="mdi mdi-lock my-2"></i>
                            <small>Ubah Password</small></a>
                        <hr>
                        <a href="/logout" class="text-dark">
                            <i class="mdi mdi-logout my-2"></i>
                            <small>Logout</small></a>
                    </div>
                </div>
            </div>
            {{-- end menu --}}
        </div>
    </div>
</section>

@endsection

@section('js')
@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');

</script>

@endif
@endsection
