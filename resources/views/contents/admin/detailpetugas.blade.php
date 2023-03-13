@extends('layouts.admin.master')

@section('title','Detail Petugas')

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
                            <li class="breadcrumb-item"><a href="/admin/petugas">Petugas</a></li>
                            <li class="breadcrumb-item active">Detail Petugas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Detail profile</h4>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Container-fluid Ends-->


<div class="container-fluid">
    <div class="edit-profile">
        <div class="row">
            <div class="col-xl">
                <div class="card">
                    <div class="card-header pb-0">
                        <h4 class="card-title mb-0">Profil {{ $petugas->nama_petugas }}</h4>
                        <div class="card-options"><a class="card-options-collapse" href="#"
                                data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                    class="fe fe-x"></i></a></div>
                    </div>
                    <div class="card-body">
                        <div class="list-persons" id="addcon">
                          <div class="list-persons" id="addcon">
                            <div class="container">
                                <div class="text-start">
                                    <p class="text-muted"><strong>Nama :</strong> <span
                                            class="ms-2">{{ $petugas->nama_petugas }}</span></p>

                                    <p class="text-muted"><strong>No.tlp :</strong><span
                                            class="ms-2">{{$petugas->telp }}</span></p>

                                    <p class="text-muted"><strong>Username :</strong> <span
                                            class="ms-2">{{ $petugas->username }}</span></p>

                                    <p class="text-muted"><strong>Email :</strong> <span
                                            class="ms-2">{{ $petugas->email }}</span></p>

                                    <p class="text-muted"><strong>Level :</strong>
                                        <span class="ms-2"> {{ $petugas->level }} </span>
                                    </p>
                                    <p class="text-muted mb-0" id="tooltip-container"><strong>Aksi
                                            :</strong>
                                        <div class="d-inline-block mt-2">

                                            <a href="/admin/editpetugas{{ $petugas->id_petugas }}}" onclick="editContact(0)"
                                                class="btn btn-primary">Edit</a></li>
                                            <a href="/admin/deletepetugas/{{$petugas->id_petugas }}" data-bs-toggle="modal"
                                                data-bs-target="#modalDelete{{$petugas->id_petugas }}"
                                                class="btn btn-danger">Hapus</a>
                                        </div>
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="modal fade" id="modalDelete{{$petugas->id_petugas }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Hapus
                                            Petugas</h5>
                                        <button class="btn-close" type="button" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin ingin menghapus
                                            {{$petugas->nama_petugas }} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-secondary" type="button"
                                            data-bs-dismiss="modal">Batal</button>
                                        <form action="/admin/deletepetugas/{{$petugas->id_petugas }}" method="POST">
                                            @method('delete')
                                            @csrf

                                            <button class="btn btn-primary" type="submit">Yakin</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-footer text-end">
                            <a href="{{ route('admin.masyarakat') }}"><button
                                    class="btn btn-primary btn-block">Kembali</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
