@extends('layouts.admin.master')


@section('title','Pengaduan')

@section('adminContent')

<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/admin/petugas">Petugas</a></li>
                            <li class="breadcrumb-item active">Sampah petugas</li>
                        </ol>
                    </div>
                    <h4 class="page-title">Sampah data petugas / admin</h4>
                </div>
            </div>
        </div>
    </div>
</div>

@if (session('pesan'))
<div class="row">
    <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Selamat ! </strong>
        <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
            data-bs-original-title="" title=""></button>
        {{ session('pesan') }}
    </div>
</div>
@endif
<div class="container">
    <div class="card">
        <div class="card-header">
            <div class=" float-end">
                <a href="/admin/petugas" class="btn btn-primary btn-sm"><i
                        class="mdi mdi-exit-to-app me-1"></i>Kembali</a>
            </div>
            <h3>Petugas</h3>
        </div>
        <div class="card-body">
            <div class="tab-content">
                <div class="tab-pane show active" id="buttons-table-preview">
                    <table id="scroll-vertical-datatable" class="table dt-responsive nowrap w-100">
                      <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Username</th>
                            <th scope="col">No telp</th>
                            <th scope="col">level</th>
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
                                <td>{{ $p->level }}</td>
                                <td>
                                    <a class="btn btn-danger mb-3"  href="/admin/forecedelete/{{ $p->id_petugas }}">Hapus permanen</a>
                                    <a class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $p->id_petugas }}" href="/admin/restore/{{ $p->id_petugas }}">restore</a>

                                     {{-- modal delete --}}
                               <div class="modal fade" id="modalDelete{{ $p->id_petugas }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title" id="exampleModalLabel">Hapus Petugas</h5>
                                      <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                      </button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Apakah anda yakin men restore {{ $p->nama_petugas }} ?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                      <a href="/admin/restore/{{ $p->id_petugas }}}" class="btn btn-primary" type="submit">Yakin</a>
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
