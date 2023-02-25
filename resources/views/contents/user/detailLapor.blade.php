@extends('layouts.user.master')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container ">
        <div class="row py-4">
            <div class="col-xl-12">
                <div class="card shadow-lg shadow-sm shadow-md mt-2 ">
                    <div class="card-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-1 d-none d-lg-block">
                                    @if (Auth::guard('masyarakat')->user()->gender ==
                                    'laki_laki')
                                    <img src="/assets/images/avatar/man.jpg"
                                    class="card-img img-fluid avatar-sm rounded-circle mx-3" alt="...">
                                    @endif
                                    @if (Auth::guard('masyarakat')->user()->gender ==
                                    'perempuan')
                                    <img src="/assets/images/avatar/girl.jpg"
                                    class="card-img img-fluid avatar-sm rounded-circle mx-3" alt="...">
                                    @endif
                                </div>
                                <div class="col-xl-11 text-start">
                                    @if ($pengaduan->hide_laporan == 2)
                                            <1>Anonymous</p>
                                            @else
                                            <h4><a href="#" class="fw-bold">{{ Auth::guard('masyarakat')->user()->nama }}</a></h4>
                                            @endif
                                    
                                </div>
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <p>{{$pengaduan->judul_laporan }}</p>
                                        </div>
                                        <div class="col-xl-4">
                                            <p>
                                                <i class="mdi mdi-calendar-month"></i>
                                                {{ optional($pengaduan->tgl_pengaduan)->format('l, d-Y') }}

                                            </p>
                                        </div>
                                        @if ($pengaduan->status == '0' && $pengaduan->nik == Auth()->guard('masyarakat')->user()->nik)
                                        
                                        <div class="col-xl-4">
                                            <a href="/edit/{{$pengaduan->id_pengaduan }}">edit</a>
                                        </div>
                                        @endif
                                        <p>{{$pengaduan->isi_laporan }}</p>
                                    </div>
                                    <div class="mb-3 d-lg-flex d-none justify-content-start">
                                        <div class="">
                                            <div class="">
                                                @foreach ($pengaduan->images as $item)
                                                <img src="/storage/{{ $item->image_path }}" alt="{{ $item->judul_laporan }}"
                                                    class="img-fluid avatar-md">
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                <a class="" data-bs-toggle="collapse" href="/laporan/{{ $pengaduan->id_pengaduan }}/detail"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Link with href
                                </a>
                                <div class="collapse" id="collapseExample">
                                        <ul class="conversation-list px-3" data-simplebar style="max-height: 554px">
                                            @if ($pengaduan->tanggapan != null)
                                            <div class="col-lg-12">
                                                <h6 class="text-center">Belum ada tanggapan</h6>
                                            </div>                                                                                       
                                            <li class="clearfix">
                                                <div class="chat-avatar">
                                                    <img src="/assets/images/users/avatar-5.jpg" class="rounded" alt="Shreyu N" />
                                                    <i>{{ optional($pengaduan->tanggapan->tgl_tanggapan)->format('H:i') }}</i>
                                                </div>
                                                <div class="conversation-text">
                                                    <div class="ctext-wrap">
                                                        <i>{{$pengaduan->tanggapan->petugas->nama_petugas }}</i>
                                                        <p>
                                                            {{$pengaduan->tanggapan->tanggapan  }}
                                                        </p>
                                                    </div>
                                                </div>
                                            </li>
                                            @endif
                                        </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->
@endsection
