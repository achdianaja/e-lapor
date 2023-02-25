@extends('layouts.admin.master')


@section('title','Pengaduan')

@section('adminContent')


<div class="container-fluid">
    <div class="page-header">
        <div class="row">
            @if (session('success'))
            <div class="alert alert-primary alert-dismissible fade show" role="alert"><strong>Selamat ! </strong>
                <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"
                    data-bs-original-title="" title=""></button>
                {{ session('success') }}
            </div>
            @endif
        </div>
    </div>
</div>

<div class="container">

    <div class="card">
        <div class="card-header">
            <h2>Pengaduan</h2>
        </div>
        <div class="card-body">
            {{-- <a class="btn btn-success mb-2" href="/admin/tambahpetugas">Tambah Data</a> --}}
            <div class="tab-content">
                <div class="tab-pane show active" id="buttons-table-preview">
                    <table id="datatable-buttons" class="table table-striped nowrap w-100">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal pengaduan</th>
                                <th scope="col">Nama pengirim</th>
                                {{-- <th scope="col">Nama Pelapor</th> --}}
                                <th scope="col">Isi Laporan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Opsi</th>

                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($pengaduan as $p)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $p->tgl_pengaduan->format('d-M-Y') }}</td>
                                <td>{{ $p->user->nama }}</td>
                                <td>{{ Str::limit($p->isi_laporan, 40) }}</td>
                                <td>
                                    @if ($p->status == '0')
                                    <span class="badge bg-danger text-white">Pending</span>
                                    @elseif ($p->status == 'proses')
                                    <span class="badge bg-warning">Proses</span>
                                    @else
                                    <span class="badge bg-success">Selesai</span>
                                    @endif
                                </td>
                                <td>
                                    <a class="btn btn-primary mb-3"
                                        href="/admin/detailpengaduan/{{ $p->id_pengaduan }}">Detail</a>
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
