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
                            @if (Session::has('pesan'))
                    <div class="alert alert-success bg-transparent text-success" role="alert">
                        {{ Session::get('pesan') }}
                    </div>
                    @endif
                    <div class="card-header bg-danger text-white fw-bold mb-2 mt-2 mx-2">
                        <h3>Sampaikan Laporan Anda</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekat.update', $pengaduan->id_pengaduan) }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror" placeholder="Ketikan Judul Laporan Anda*"
                                    name="judul_laporan" value="{{ $pengaduan->judul_laporan }}">
                                    @error('judul_laporan')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control @error('isi_laporan') is-invalid @enderror" id="example-textarea" rows="6"
                                    placeholder="Ketik isi laporan anda*" style="resize: none;"
                                    name="isi_laporan">{{ $pengaduan->isi_laporan }}</textarea>
                                    @error('isi_laporan')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <div class="mb-3 position-relative" id="datepicker4">
                                <input type="text" class="form-control @error('tgl_pengaduan') is-invalid @enderror" data-provide="datepicker" data-date-autoclose="true"
                                    data-date-container="#datepicker4" placeholder="Pilih tanggal kejadian"
                                    name="tgl_pengaduan" value="{{ $pengaduan->tgl_pengaduan }}">
                                    @error('tgl_pengaduan')
                                        {{ $message }}
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="lokasi_kejadian" placeholder="Ketikan lokasi kejadian*"
                                    class="form-control @error('lokasi_kejadian') is-invalid @enderror" value="{{ $pengaduan->lokasi_kejadian }}">
                                    @error('lokasi_kejadian')
                                        {{ $message }}
                                    @enderror
                            </div>
                            
                            <div class="mb-3">
                                @foreach ($pengaduan->images as $item)
                                <div class="card">
                                    <div class="card-body">
                                    <div class="form-check">
                                        <input type="checkbox" name="imagesDelete[]" id="checkbox1" accept="image/*" multiple class="form-check-input @error('images') is-invalid @enderror" value="{{ $item->id }}">
                                        <label class="form-check-label" for="checkbox1">
                                            <img src="/storage/{{ $item->image_path }}" alt="Image 1" class="avatar-md">
                                        </label>
                                    </div>
                                    </div>
                                </div>
                                @endforeach
                                @error('images')
                                    {{ $message }}
                                @enderror
                            </div>

                            <div class="row container">
                                
                                <div class="mb-3 form-check col-3">
                                    <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                        name="hide_identitas">
                                    <label class="form-check-label" for="customCheck3">anonymous</label>
                                </div>

                                <div class="mb-3 form-check col-3">
                                    <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                        name="hide_laporan">
                                    <label class="form-check-label" for="customCheck3">rahasia</label>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-primary">Lapor!</button>
                                </div>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->
@endsection
