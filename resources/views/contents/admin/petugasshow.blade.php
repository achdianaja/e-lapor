@extends('layouts.admin.master')


@section('title','Petugas')

@section('adminContent')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Petugas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data petugas</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('success'))
<div class="row">
    <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Selamat ! </strong>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title=""
            title=""></button>
        {{ session('success') }}
    </div>
</div>
@endif

<div class="container ">
    <div class="card">
        <div class="card-header">
            <div class=" float-end">
                <!-- item-->
                <a href="/admin/trash" class="btn btn-sm btn-danger"><i class="mdi mdi-delete me-1"></i>Trash</a>
                <!-- item-->
                <a href="/admin/tambahpetugas" class="btn btn-sm btn-success"><i class="mdi mdi-plus-circle-outline me-1"></i>Add
                    Petugas / Admin</a>
            </div>
            <h3>Petugas & Admin</h3>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="buttons-table-preview">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Username</th>
                                <th scope="col">No telp</th>
                                <th scope="col">Level</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($petugas as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->nama_petugas }}</td>
                                <td>{{ $p->username }}</td>
                                <td>{{ $p->telp }}</td>
                                <td>
                                    @if ( $p->level == 'petugas')
                                    <span class="badge badge-success-lighten rounded-pill">{{ $p->level }}</span>
                                    @else
                                    <span class="badge badge-danger-lighten rounded-pill">{{ $p->level }}</span>

                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary mb-3"
                                        href="/admin/detailpetugas/{{ $p->id_petugas }}">Detail</a>
                                    <a class="btn btn-warning mb-3"
                                        href="/admin/editpetugas/{{ $p->id_petugas }}">Edit</a>
                                    <a class="btn btn-danger mb-3" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $p->id_petugas }}"
                                        href="/admin/deletepetugas/{{ $p->id_petugas }}">Hapus</a>

                                    {{-- modal delete --}}
                                    <div class="modal fade" id="modalDelete{{ $p->id_petugas }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus {{ $p->nama_petugas }} dengan level {{ $p->level }}</p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/admin/deletepetugas/{{ $p->id_petugas }}"
                                                        method="POST">
                                                        @csrf
                                                        @method('delete')
                                                        <button class="btn btn-primary" type="submit">Yakin</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>
</div>

@endsection
