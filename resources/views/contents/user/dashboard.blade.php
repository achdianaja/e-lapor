@extends('layouts.user.master')

@section('title', 'Laporan')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container ">

        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    {{-- <h1 class="mt-3 "><i class="mdi mdi-infinity"></i></h1>s --}}
                    <h1 class="text-light">Layanan <span class="text-warning">Aspirasi</span> dan <span
                            class="text-warning">Pengaduan</span> Onlien Masyarakat</h1>
                    <h3 class="text-white">Ayo sampaikan Aspirasi dan laporan anda di bawah ini</h3>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-8">
                <div class="card shadow-lg shadow-sm shadow-md mt-2 ">
                    @if (Session::has('pesan'))
                    <div class="alert alert-success bg-transparent text-success" role="alert">
                        {{ Session::get('pesan') }}
                    </div>
                    @endif
                    <div class="card-header bg-primary text-white fw-bold mb-2 mt-2 mx-2">
                        <h3>Sampaikan Laporan Anda</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control @error('judul_laporan') is-invalid @enderror"
                                    placeholder="Ketikan Judul Laporan Anda*" name="judul_laporan" autocomplete='off'>
                                @error('judul_laporan')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control @error('isi_laporan') is-invalid @enderror"
                                    id="example-textarea" rows="6" placeholder="Ketik isi laporan anda*"
                                    style="resize: none;" name="isi_laporan"></textarea>
                                @error('isi_laporan')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3 position-relative" id="datepicker4">
                                <input type="text" class="form-control @error('tgl_pengaduan') is-invalid @enderror"
                                    data-provide="datepicker" data-date-autoclose="true"
                                    data-date-container="#datepicker4" placeholder="Pilih tanggal kejadian"
                                    name="tgl_pengaduan" autocomplete='off'>
                                @error('tgl_pengaduan')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" name="lokasi_kejadian" placeholder="Ketikan lokasi kejadian*"
                                    class="form-control @error('lokasi_kejadian') is-invalid @enderror" autocomplete='off'>
                                @error('lokasi_kejadian')
                                <small class="invalid-feedback">
                                    {{ $message }}
                                </small>
                                @enderror
                            </div>


                            <div class="mb-3">
                                <select name="id_categories" id="" class="form-control">
                                    <option value="" selected disabled>Pilih Kategori</option>
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
                                    <button type="submit" class="btn btn-primary">Lapor!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="card text-center">
                    <div class="card-body">
                        @if ($foto)
                        <img src="{{ asset($foto) }}" class="rounded-circle avatar-lg img-thumbnail" alt="...">
                        @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                        <img src="/assets/images/avatar/girl.jpg" class="rounded-circle avatar-lg img-thumbnail"
                            alt="...">
                        @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                        <img src="/assets/images/avatar/man.jpg" class="rounded-circle avatar-lg img-thumbnail"
                            alt="...">
                        @endif


                        <h4 class="mb-0 mt-2">{{ Auth::guard('masyarakat')->user()->nama }}</h4>
                        <p class="text-muted font-14">{{ Auth::guard('masyarakat')->user()->username }}</p>
                        <hr>

                        <div class="list-group list-group-flush text-start">
                            <a href="/laporan" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-file-document me-2"></i>
                                Laporan saya
                            </a>

                            <a href="/profile/{{ $masyarakat->nik }}" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-face-man me-2"></i>
                                Ubah Profile
                            </a>

                            <a href="/logout" class="list-group-item list-group-item-action text-primary border-0">
                                <i class="mdi mdi-logout me-2"></i>
                                Logout
                            </a>

                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col-->
        </div>
    </div>
</section>
<!-- END HERO -->
@endsection
