@extends('layouts.user.master')

@section('title', 'Beranda')
    
@section('content')
<!-- START SERVICES -->
<section class="py-10 hero-section">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    {{-- <h1 class="mt-3 "><i class="mdi mdi-infinity"></i></h1>s --}}
                    <h1 class="text-white">Layanan <span class="text-warning">Aspirasi</span> dan <span
                            class="text-warning">Pengaduan</span> Onlie Masyarakat</h1>
                            <h1 class="text-white">Jumlah <span class="text-warning">Laporan</span> saat ini </h1>
                </div>
            </div>
        </div>

        

        @include('contents.user.count')

        <div class="row">
            <h1>semua laporan</h1>
            @if ($pengaduan->isEmpty())
                                <div class="col-lg-12">
                                    <h6 class="text-center">Belum ada Laporan</h6>
                                </div>
                                @else
            @foreach ($pengaduan as $item)
            
            <div class="col-lg-4">
                <div class="card text-start">
                  <img class="card-img-top" src="holder.js/100px180/" alt="Title">
                  <div class="card-body">
                    <a href="/laporan/{{ $item->id_pengaduan }}/detail">{{ $item->judul_laporan }}</a>
                  </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>

    </div>
</section>
<!-- END SERVICES -->
@endsection
