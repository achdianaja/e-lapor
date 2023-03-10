@extends('layouts.admin.master')

@section('title', 'Tambah masyarakat')

@section('adminContent')



<!-- Container-fluid starts-->
<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/petugas">Petugas</a></li>
                            <li class="breadcrumb-item active">Tambah petugas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Tambah data petugas / admin</h4>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Container-fluid Ends-->

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header pb-0">
                    <div class=" float-end">
                        <a href="/petugas" class="btn btn-primary btn-sm"><i
                                class="mdi mdi-exit-to-app me-1"></i>Kembali</a>
                    </div>
                    <h3>Lengkapi Form</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <form action="/admin/storepetugas" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Nama Petugas</label>
                                    <div class="input-group">
                                        <input class="form-control @error('nisn') is-invalid @enderror" type="text"
                                            name="nama_petugas" placeholder="Nama lengkap">
                                    </div>
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Username</label>
                                    <div class="input-group">
                                        <input class="form-control @error('nisn') is-invalid @enderror" type="text"
                                            name="username" placeholder="Username">
                                    </div>
                                    @error('username')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <div class="input-group">
                                        <input class="form-control @error('email') is-invalid @enderror" type="text"
                                            name="email" placeholder="email">
                                    </div>
                                    @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Telp</label>
                                    <div class="input-group">
                                        <input class="form-control @error('nisn') is-invalid @enderror" type="text"
                                            name="telp" placeholder="contoh:08909890">
                                    </div>
                                    @error('nisn')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <div class="input-group">
                                        <input class="form-control @error('password') is-invalid @enderror"
                                            name="password" type="password" aria-label="Amount (to the nearest dollar)"
                                            placeholder="Password">
                                    </div>
                                    @error('password')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>
                                <div class="mb-3 input-group-solid">
                                    <label class="form-label">Level</label>
                                    <select name="level" class="form-select form-control">
                                        <option selected disabled>Pilih Level</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="admin">Admin</option>
                                    </select>
                                    @error('jurusan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                    @enderror
                                </div>

                                <button class="btn btn-primary" type="submit">Tambah</button>
                                <a href="/admin/petugas" class="btn btn-light">Batal</a>
                                <div class="card-footer">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
