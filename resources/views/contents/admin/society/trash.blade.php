@extends('layouts.admin.master')


@section('title','Masyarakat')
    
@section('adminContent')

<div class="container-fluid">
  <div class="page-header">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard.index') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="/admin/petugas">Masyarakat</a></li>
                        <li class="breadcrumb-item active">Sampah petugas</li>
                    </ol>
                </div>
                <h4 class="page-title">Sampah data masyarakat</h4>
            </div>
        </div>
    </div>
</div>
</div>

      @if (session('pesan'))
      <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Selamat ! </strong>
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close" data-bs-original-title="" title=""></button>
          {{ session('pesan') }}
        </div>
        @endif
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header d-flex justify-content-between">
                    <h5>Data Sampah Masyarakat</h5>
                    <a class="btn btn-primary mb-2" href="/admin/masyarakat">Kembali</a>
                </div>
                <div class="card-body mb-4">
                  {{-- <a class="btn btn-success mb-2" href="/admin/masyarakat/tambah">Tambah Data</a> --}}
                    <div class="dt-ext table-responsive">
                      <table id="scroll-vertical-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">NIK</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($society as $s)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                    <td>{{ $s->nik }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->username }}</td>
                                    <td>{{ $s->email }}</td>
                                    <td>
                                        <a class="btn btn-danger mb-3" href="/admin/masyarakat/forecedelete/{{ $s->nik }}">Hapus permanen</a>
                                        <a class="btn btn-warning mb-3" data-bs-toggle="modal" data-bs-target="#modalDelete{{ $s->nik }}" href="/admin/masyarakat/restore/{{ $s->nik }}">Restore</a>

                                         {{-- modal delete --}}
                                   <div class="modal fade" id="modalDelete{{ $s->nik }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Hapus Masyarakat</h5>
                                          <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close">
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Apakah anda yakin me restore {{ $s->nama }} ?</p>
                                          </div>
                                          <div class="modal-footer">
                                            <button class="btn btn-secondary" type="button" data-bs-dismiss="modal">Batal</button>
                                            <a href="/admin/masyarakat/restore/{{ $s->nik }}" class="btn btn-primary" type="submit">Yakin</a>
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
</div>

@endsection