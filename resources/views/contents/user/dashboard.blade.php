@extends('layouts.user.master')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container ">

        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    {{-- <h1 class="mt-3 "><i class="mdi mdi-infinity"></i></h1>s --}}
                    <h1 class="text-light">Layanan <span class="text-warning">Aspirasi</span> dan <span
                            class="text-warning">Pengaduan</span> Onlie Masyarakat</h1>
                    <h3 class="text-white">Sampaikan laporan Anda langsung kepada instansi pemerintah berwenang</h3>
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
                    <div class="card-header bg-danger text-white fw-bold mb-2 mt-2 mx-2">
                        <h3>Sampaikan Laporan Anda</h3>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('pekat.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="mb-3">
                                <input type="text" class="form-control "
                                    placeholder="Ketikan Judul Laporan Anda*" name="judul_laporan">
                                @if($errors->has('judul_laporan'))
                                    <div class="text-danger">{{ $errors->first('judul_pengaduan') }}</div>
                                @endif
                            </div>
                            <div class="mb-3">
                                <textarea class="form-control "
                                    id="example-textarea" rows="6" placeholder="Ketik isi laporan anda*"
                                    style="resize: none;" name="isi_laporan"></textarea>
                                {{-- @if('isi_laporan') --}}
                                {{-- {{ $messasge }}
                                @endif --}}
                            </div>
                            <div class="mb-3 position-relative" id="datepicker4">
                                <input type="text" class="form-control"
                                    data-provide="datepicker" data-date-autoclose="true"
                                    data-date-container="#datepicker4" placeholder="Pilih tanggal kejadian"
                                    name="tgl_pengaduan">
                                {{-- @if('tgl_pengaduan') --}}
                                {{-- {{ $messasge }}
                                @endif --}}
                            </div>
                            <div class="mb-3">
                                <input type="text" name="lokasi_kejadian" placeholder="Ketikan lokasi kejadian*"
                                    class="form-control ">
                                {{-- @if('lokasi_kejadian') --}}
                                {{-- {{ $messasge }}
                                @endif --}}
                            </div>
                            <div class="mb-3">
                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body mb-0">
                                        <input type="file" name="images[]" accept="image/*" multiple
                                            class="form-control ">
                                        {{-- @if('images')
                                        {{ $messasge }}
                                        @endif --}}
                                    </div>
                                </div>
                                <a class="btn btn-primary d-none" data-bs-toggle="collapse" href="#collapseExample"
                                    aria-expanded="false" aria-controls="collapseExample">
                                    Tambahkan lampiran
                                </a>
                            </div>

                            <div class="row container">
                                <div class="col-3">
                                    <a class="" data-bs-toggle="collapse" href="#collapseExample" aria-expanded="false"
                                        aria-controls="collapseExample">
                                        Tambahkan foto
                                    </a>
                                </div>
                                <div class="mb-3 form-check form-checkbox-warning col-3">
                                    <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                        name="hide_identitas">
                                    <label class="form-check-label" for="customCheck3">anonymous</label>
                                </div>

                                <div class="mb-3 form-check form-checkbox-warning col-3">
                                    <input type="checkbox" value="2" class="form-check-input" id="customCheck3"
                                        name="hide_laporan">
                                    <label class="form-check-label" for="customCheck3">rahasia</label>
                                </div>
                                <div class="col-3">
                                    <button type="submit" class="btn btn-warning">Lapor!</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 mt-2">
                <div class="card shadow-lg shadow-sm shadow-md">
                    <div class="row g-0 align-items-center">
                        <div class="col-md-12">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-12">
                                        <div class="d-flex">
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
                                            <div>
                                                <h4 class="m-3 ">{{ Auth::guard('masyarakat')->user()->nama }}</h4>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <hr>

                                <a href="/profile/{{ $masyarakat->nik }}" class="text-dark">
                                    <i class="mdi mdi-face-man my-2"></i>
                                    Profile
                                </a>
                                <hr>
                                <a href="/laporan" class="text-dark">
                                    <i class="mdi mdi-lock my-2"></i>
                                    Laporan Saya
                                </a>
                                <hr>
                                <a href="/logout" class="text-dark">
                                    <i class="mdi mdi-logout my-2"></i>
                                    Logout
                                </a>


                            </div> <!-- end card-body-->
                        </div> <!-- end col -->
                    </div> <!-- end row-->
                </div> <!-- end card-->
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->
@endsection
