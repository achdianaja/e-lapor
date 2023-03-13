@extends('layouts.user.master')


@section('title', 'Edit Profile')

@section('content')
{{-- Section Card --}}
<section class="hero-section">
    <div class="container">
        <div class="row justify-content-between">
            <div class="col-md-12">
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
                                        </div>
                                    </div>
                                </div>
                            </div> <!-- end col-->

                            <div class="col-sm-4">
                                <div class="text-center mt-3 text-sm-end">
                                    <a href="/laporan" type="button" class="btn btn-light">
                                        <i class="mdi mdi-logout me-1"></i> Kembali
                                    </a>
                                </div>
                            </div> <!-- end col-->
                        </div> <!-- end row -->
                    </div> <!-- end card-body/ profile-user-box-->
                </div><!--end profile/ card -->
            </div>
        </div>

        {{-- status laporan --}}
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-xl-2 mb-2 mb-sm-0">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                            aria-orientation="vertical">
                            <a class="nav-link active show" id="v-pills-home-tab"
                                href="{{ route('pekat.profile', $masyarakat->nik) }}" role="tab"
                                aria-controls="v-pills-home" aria-selected="true">
                                <i class="mdi mdi-home-variant d-md-none d-block"></i>
                                <span class="d-none d-md-block">Ubah Profile</span>
                            </a>
                            <a class="nav-link" id="v-pills-settings-tab"
                                href="{{ route('pekat.ubahpw', $masyarakat->nik) }}">
                                <i class="mdi mdi-settings-outline d-md-none d-block"></i>
                                <span class="d-none d-md-block">Ubahpassword</span>
                            </a>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-xl-10">
                        <h1>Ubah Profile</h1>
                        <hr>
                        <h3 class="lead mb-3 mt-3s">Informasi Public</h3>

                        <form action="/update/{{ $masyarakat->nik }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('put')
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input class="form-control" type="text" id="nama" required placeholder="Nama Lengkap"
                                    name="nama" value="{{ $masyarakat->nama }}">
                                @if($errors->has('nama'))
                                <div class="alert alert-danger" role="alert">
                                    <strong>Error - </strong>{{ $errors->first('nama') }}
                                </div>
                                @endif
                            </div>
                            <div class="mb-3">

                                <label for="username" class="form-label">Username</label>
                                <input class="form-control  @error('username') is-invalid @enderror" type="text"
                                    id="username" required placeholder="Ketikan username" name="username"
                                    value="{{ $masyarakat->username }}">
                                @error('username')
                                <div class="invalid-feedback position-absolute start-0 top-100">
                                    Mohon Masukan Username
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="upload">
                                    <div class="dropzone">
                                        <i class="mdi mdi-shape-square-rounded-plus">
                                            Pilih foto
                                            <img id="image" src="#" alt=""  class="d-block image-fluid forimg" style="display:none">
                                        </i>
                                    </div>
                                </label>
                                <input type="file" id="upload" accept="image/*" name="foto"
                                    value="" style="display:none" onchange="readURL(this)">
                            </div>

                            <hr>
                            <h3 class="lead">Informasi Pribadi</h3>
                            <div class="mb-3">
                                <label for="nik" class="form-label">NIK</label>

                                <input type="text" class="form-control" id="example-disable" disabled=""
                                    value="{{ $masyarakat->nik }}">
                                @error('nik')
                                <div class="invalid-feedback position-absolute start-0 top-100">
                                    Mohon NIK dengan benar!
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Email</label>
                                <input class="form-control  @error('email') is-invalid @enderror" type="email"
                                    id="username" required placeholder="Ketikan Email" name="email"
                                    value="{{ $masyarakat->email }}">
                                @error('email')
                                <div class="invalid-feedback position-absolute start-0 top-100">

                                    Mohon Masukan Username
                                </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="telp" class="form-label">No. Tlp</label>
                                <input class="form-control  @error('tlp') is-invalid @enderror" type="text" id="telp"
                                    required placeholder="Ketikan Nomor Telepon" name="telp" data-toggle="input-mask"
                                    data-mask-format="0000-0000-00000" value="{{ $masyarakat->telp }}">
                                @error('telp')
                                <div class="invalid-feedback position-absolute start-0 top-100">
                                    Mohon Masukan no tlp
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gender" class="form-label">Jenis kelamin</label>
                                <select class="form-select mb-3" id="gender" name="gender">
                                    <option value="{{ $masyarakat->gender }}">{{ $masyarakat->gender }}</option>
                                    <option value="Laki_laki">Laki-laki</option>
                                    <option value="perempuan">Perempuan</option>
                                    <option value="1">Rahasia</option>
                                </select>
                                @error('geder')
                                <div class="invalid-feedback position-absolute start-0 top-100">

                                    Pilih gender
                                </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <button type="submit" class="btn btn-primary">simpan</button>
                            </div>
                        </form>
                    </div>
                </div> <!-- end card-body -->
            </div> <!-- end card-->
        </div> <!-- end col -->
        {{-- end status laporan  --}}
    </div>
    </div>
</section>


@if (Session::has('pesan'))
<script>
    $('#loginModal').modal('show');

</script>

@endif
@endsection
