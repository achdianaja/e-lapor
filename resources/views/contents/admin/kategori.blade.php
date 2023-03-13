@extends('layouts.admin.master')


@section('title','Kategori')

@section('adminContent')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item active">Kategori</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Data Kategori</h4>
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
                {{-- <a href="/admin/trash" class="btn btn-sm btn-danger"><i class="mdi mdi-delete me-1"></i>Trash</a> --}}
                <!-- item-->
                {{-- <a href="/admin/tambahpetugas" class="btn btn-sm btn-success"> --}}
                <!-- Login modal -->
                <button type="button" class="btn btn-sm btn-info" data-bs-toggle="modal" data-bs-target="#login-modal">
                    <i class="mdi mdi-plus-circle-outline me-1"></i>Add
                    kategori</a>
                </button>
                <div id="login-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body">
                                <div class="text-center mt-2 mb-4">
                                    <a href="index.html" class="text-success">
                                        <span><img src="assets/images/logo-dark.png" alt="" height="18"></span>
                                    </a>
                                </div>

                                <form action="/admin/kategori/add" class="" method="post">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="emailaddress1" class="form-label">Nama kategori</label>
                                        <input class="form-control" type="text" id="emailaddress1"
                                            placeholder="ex Kesehatan" name="name">
                                    </div>

                                    <div class="mb-3 text-center">
                                        <button class="btn rounded-pill btn-primary" type="submit">Simpan</button>
                                    </div>

                                </form>

                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->


            </div>
            <h3>Kategori</h3>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="buttons-table-preview">
                    <table id="datatable-buttons" class="table table-striped dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($kategori as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->name }}</td>
                                <td>
                                    <a class="btn btn-danger mb-3" data-bs-toggle="modal"
                                        data-bs-target="#modalDelete{{ $p->id }}"
                                        href="/admin/kategori/{{ $p->id }}">Hapus</a>

                                    {{-- modal delete --}}
                                    <div class="modal fade" id="modalDelete{{ $p->id }}" tabindex="-1"
                                        role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Hapus Kategori</h5>
                                                    <button class="btn-close" type="button" data-bs-dismiss="modal"
                                                        aria-label="Close">
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p>Apakah anda yakin menghapus kategori {{ $p->name }} </p>
                                                </div>
                                                <div class="modal-footer">
                                                    <button class="btn btn-secondary" type="button"
                                                        data-bs-dismiss="modal">Batal</button>
                                                    <form action="/admin/kategori/{{ $p->id }}"
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
