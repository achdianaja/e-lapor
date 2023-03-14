@extends('layouts.user.master')

@section('title', 'Edit Profile')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container ">
        <div class="row py-4">
            <div class="col-xl-12">
                {{-- <button class="btn btn-light">
                    <i class="mdi mdi-logout"></i>
                </button> --}}
                <div class="card shadow-lg shadow-sm shadow-md mt-2 ">
                    <div class="card-body">
                        <div class="container">
                            @if (Session::has('pesan'))
                            <div class="alert alert-success bg-transparent text-success" role="alert">
                                {{ Session::get('pesan') }}
                            </div>
                            @endif
                            <div class="card-header bg-danger text-white fw-bold mb-2 mt-2 mx-2">
                                <h3>Ubah Laporan</h3>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('pekat.update', $pengaduan->id_pengaduan) }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <input type="text"
                                            class="form-control @error('judul_laporan') is-invalid @enderror"
                                            placeholder="Ketikan Judul Laporan Anda*" name="judul_laporan"
                                            value="{{ $pengaduan->judul_laporan }}">
                                        @error('judul_laporan')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <textarea class="form-control @error('isi_laporan') is-invalid @enderror"
                                            id="example-textarea" rows="6" placeholder="Ketik isi laporan anda*"
                                            style="resize: none;"
                                            name="isi_laporan">{{ $pengaduan->isi_laporan }}</textarea>
                                        @error('isi_laporan')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3 position-relative" id="datepicker4">
                                        <input type="text"
                                            class="form-control @error('tgl_pengaduan') is-invalid @enderror"
                                            data-provide="datepicker" data-date-autoclose="true"
                                            data-date-container="#datepicker4" placeholder="Pilih tanggal kejadian"
                                            name="tgl_pengaduan" value="{{ $pengaduan->tgl_pengaduan }}">
                                        @error('tgl_pengaduan')
                                        {{ $message }}
                                        @enderror
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" name="lokasi_kejadian" placeholder="Ketikan lokasi kejadian*"
                                            class="form-control @error('lokasi_kejadian') is-invalid @enderror"
                                            value="{{ $pengaduan->lokasi_kejadian }}">
                                        @error('lokasi_kejadian')
                                        {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <select name="id_categories" id="" class="form-control">
                                            {{-- <option value="{{ $categories->id }}">{{ $categories->name }}</option> --}}
                                            @foreach ($categories as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-3">
                                        <input type="file" name="images[]" accept="image/*" multiple
                                            class="form-control @error('images') is-invalid @enderror" id="image">
                                        <div class="row mt-2" id="image-preview-container" style="display:none;">
                                            <div class="col-12" id="image-preview"></div>
                                        </div>
                                        @error('images')
                                        <small class="invalid-feedback">
                                            {{ $message }}
                                        </small>
                                        @enderror
                                    </div>


                                    <div class="mb-3">
                                        <div class="row">
                                            @foreach ($pengaduan->images as $item)
                                            <div class="col-md-1">
                                                <div class="form-check-label">
                                                    <input type="checkbox" name="imagesDelete[]"
                                                        id="checkbox{{ $loop->iteration }}" accept="image/*" multiple
                                                        class="form-check-input @error('images') is-invalid @enderror"
                                                        value="{{ $item->id }}">
                                                    <label class="form-check-label"
                                                        for="checkbox{{ $loop->iteration }}">
                                                        <img src="/storage/{{ $item->image_path }}" alt="Image 1"
                                                            class="avatar-md">
                                                    </label>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @error('images')
                                        {{ $message }}
                                        @enderror
                                    </div>

                                    <div class="d-flex justify-content-between">
                                        <span>Pilih status laporanmu :
                                            <a type="button" class="" data-bs-toggle="tooltip" data-bs-placement="top"
                                                data-bs-title="Pilih status laporanmu jika laporanmu tidak ingin di lihat">
                                                <i class="uil uil-question-circle"></i>
                                            </a>
                                        </span>
                                        <div class="mb-3 form-check form-checkbox-primary">
                                            <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                                name="hide_identitas">
                                            <label class="form-check-label" for="customCheck3">anonymous</label>
                                        </div>

                                        <div class="mb-3 form-check form-checkbox-primary">
                                            <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                                name="hide_laporan">
                                            <label class="form-check-label" for="customCheck3">rahasia</label>
                                        </div>
                                        <div class="d-flex flex-column">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
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
