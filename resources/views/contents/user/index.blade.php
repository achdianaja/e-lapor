@extends('layouts.user.master')

@section('title', 'Beranda')

@section('content')
<!-- START SERVICES -->
<div class="">
    <div class="container-fliud">
        <div class="row py-5 bg-primary">
            <div class="col-lg-12">
                <div class="text-center py-5">
                    {{-- <h1 class="mt-3 "><i class="mdi mdi-infinity"></i></h1>s --}}
                    <h1 class="text-white">Layanan <span class="text-warning">Aspirasi</span> dan <span
                            class="text-warning">Pengaduan</span> Online Masyarakat</h1>
                    <h3 class="text-white">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h3>

                </div>
            </div>
        </div>

        <div class="row py-5 bg-light">
            <div class="col-lg-12 col-md-12">
                <div class="text-center ">
                    <h2 class="text-dark">Jumlah <span class="text-warning">Laporan</span> saat ini </h2>
                    <h1 class="counter">{{ $pengaduan->count() }}</h1>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row py-5">
                <h1>Kisah <span class="text-warning">Sukses</span></h1>
                @if ($pengaduan->isEmpty())
                <div class="col-lg-12">
                    <h6 class="text-center">Belum ada Laporan</h6>
                </div>
                @else
                @foreach ($pengaduan->take(3) as $item)
                <div class="col-lg-4 mt-2">
                    <div class="card text-start h-100">
                        <div class="card-body">
                            <div class="justify-content-between">
                                <a href="/laporan/{{ $item->id_pengaduan }}/detail"
                                    class="h3">{{ $item->judul_laporan }}</a>
                            </div>
                            <div class="py-0">
                                <h3 class="lead">{{ Str::limit($item->isi_laporan, 100) }}</h3>
                            </div>
                                <div class="d-flex justify-content-start">
                                    @if($item->user->gender == 'perempuan')
                                    <img src="/assets/images/avatar/girl.jpg"
                                        class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                                    @else
                                    <img src="/assets/images/avatar/man.jpg"
                                        class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                                    @endif
                                    @if ($item->hide_laporan == 2)
                                    <p>Anonymous</p>
                                    @else
                                    <p>{{ $item->user->nama }}</p>
                                    @endif
                                </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif

            </div>
            <div class="d-flex justify-content-center mb-5">
                <button class="btn btn-outline-primary btn-lg">Baca Selengkapnya</button>
            </div>
        </div>
    </div>
</div>
<!-- END SERVICES -->
@endsection
