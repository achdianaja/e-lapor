@extends('layouts.user.master')


@section('title', 'Laporan')

@section('content')

{{-- Section Card --}}
<section class="hero-section py-3">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Profile -->
                        <div class="card bg-white">
                            <div class="card-body profile-user-box shadow-lg">
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div class="row align-items-center">
                                            <div class="col-auto">
                                                <div class="avatar-lg">
                                                    @if ($foto)
                                                    <img src="{{ asset($foto) }}" class="rounded-circle img-thumbnail"
                                                        alt="...">
                                                    @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                                                    <img src="/assets/images/avatar/girl.jpg"
                                                        class="rounded-circle img-thumbnail" alt="...">
                                                    @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                                                    <img src="/assets/images/avatar/man.jpg"
                                                        class="rounded-circle img-thumbnail" alt="...">
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="col">
                                                <div>
                                                    <h3  class="mt-1 mb-1">{{ Auth::guard('masyarakat')->user()->nama }}</h3>
                                                    <p class="font-13 -50"> {{ Auth::guard('masyarakat')->user()->username }}</p>

                                                    <ul class="mb-0 list-inline">
                                                        <li class="list-inline-item me-3">
                                                            <h5 class="mb-1 ">{{ $semua }}</h5>
                                                            <p class="mb-0 font-13 ">Semua Laporan</p>
                                                        </li>
                                                        <li class="list-inline-item">
                                                            <h5 class="mb-1 ">{{ $selesai }}</h5>
                                                            <p class="mb-0 font-13 ">Laporan Selesai</p>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div> <!-- end col-->

                                    <div class="col-sm-4">
                                        <div class="text-center mt-sm-0 mt-3 text-sm-end">
                                            <a href="/profile/{{ $masyarakat->nik }}" type="button" class="btn btn-light">
                                                <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                                            </a>
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->
                            </div> <!-- end card-body/ profile-user-box-->
                        </div><!--end profile/ card -->
                    </div> <!-- end col-->
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
                                <a href="{{ route('pekat.laporan') }}"
                                    class="nav-link {{ request('status') == null ? 'active' : '' }}">
                                    <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Semua Laporan</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pekat.laporan', ['status' => 'proses']) }}"
                                    class="nav-link {{ request('status') == 'proses' ? 'active' : '' }}">
                                    <i class="mdi mdi-account-circle d-md-none d-block"></i>
                                    <span class="d-none d-md-block">Proses</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('pekat.laporan', ['status' => 'selesai']) }}"
                                    class="nav-link {{ request('status') == 'selesai' ? 'active' : ''}}">
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
                                        <div class="clearfix">
                                            <div class="float-start">
                                                <div class="d-flex justify-content-start">
                                                    @if ($foto)
                                                    <img src="{{ asset($foto) }}"
                                                        class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                                                    @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                                                    <img src="/assets/images/avatar/girl.jpg"
                                                        class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                                                    @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                                                    <img src="/assets/images/avatar/man.jpg"
                                                        class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                                                    @endif
                                                    @if ($v->hide_laporan == 2)
                                                    <p>Anonymous</p>
                                                    @else
                                                    <p>{{ $v->user->nama }}</p>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="float-end">

                                                @if ($v->status == '0')
                                                <p class="badge bg-danger rounded-pill">Pending</p>
                                                @elseif($v->status == 'proses')
                                                <p class="badge bg-warning rounded-pill">{{ ucwords($v->status) }}
                                                </p>
                                                @else
                                                <p class="badge bg-success rounded-pill">{{ ucwords($v->status) }}
                                                </p>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="clearfix">
                                            <div class="float-start">
                                                <h4>
                                                    <a href="/laporan/{{ $v->id_pengaduan }}/detail">{{ $v->judul_laporan }}</a>
                                                </h4>
                                            </div>
                                            <div class="float-end">
                                                <small>{{ $v->tgl_pengaduan->format('d M, h:i') }}</small>
                                            </div>
                                        </div>

                                        <p>{{ Str::limit($v->isi_laporan, 100) }} <a
                                                href="/laporan/{{ $v->id_pengaduan }}/detail">Selengkapnya</a> </p>
                                            
                                                @foreach ($v->images as $item)
                                                    
                                                <img src="/storage/{{ $item->image_path }}"
                                                    alt="{{ 'Gambar '.$v->judul_laporan }}" class="img-fluid avatar-md">
                                                @endforeach

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
                        <div class="list-group list-group-flush text-start">
                            <a href="/profile/{{ $masyarakat->nik }}" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-face-man me-2"></i>
                                Ubah Profile
                            </a>

                            <a href="{{ route('pekat.ubahpw', $masyarakat->nik) }}" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-lock me-2"></i>
                                Ubah password
                            </a>


                            <a href="/logout" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-logout me-2"></i>
                                Logout
                            </a>

                        </div>
                    </div>
                </div>
            </div>
            {{-- end menu --}}
        </div>
    </div>
</section>

@endsection

@section('js')
@if (session()->has('pesanprofile'))
<script>
    $.toast({
    heading: 'Success',
    text: 'Laporan terkirim',
    showHideTransition: 'slide',
    position: 'top-right',
    icon: 'success'
    })
</script>
@endif

@if (session()->has('pesanhapus'))
<script>
    $.toast({
    heading: 'Success',
    text: 'Laporan terhapus',
    showHideTransition: 'slide',
    position: 'top-right',
    icon: 'success'
    })
</script>
@endif
@endsection
