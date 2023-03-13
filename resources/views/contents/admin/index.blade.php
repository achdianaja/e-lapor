@extends('layouts.admin.master')

@section('title', 'Dashboard')

@section('adminContent')

<div class="content">

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Dashboard E - lapor</h4>
                </div>
            </div>
        </div>
        <!-- end page title -->

        <div class="row">
            @if (Auth::guard('admin')->user()->level == 'petugas')
            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="Masyarakat">
                                    Semua Pengaduan</h5>
                                <h3 class="my-2 py-1">{{ $semua }}</h3>
                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="campaign-sent-chart" data-colors="#727cf5"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="New Leads">Pengaduan Proses</h5>
                                <h3 class="my-2 py-1">{{ $proses }}</h3>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="new-leads-chart" data-colors="#0acf97"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h5 class="text-muted fw-normal mt-0 " title="New Leads">Pengaduan Selesai</h5>
                                <h3 class="my-2 py-1">{{ $selesai }}</h3>

                            </div>
                            <div class="col-6">
                                <div class="text-end">
                                    <div id="new-leads-chart" data-colors="#0acf97"></div>
                                </div>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            @else
            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-muted fw-normal mt-0 " title="Masyarakat">
                                        <i class="mdi mdi-account-group"></i>
                                    Jumlah masyarakat</h5>
                                <h3 class="my-2 py-1">{{ $masyarakat }}</h3>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->

            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-muted fw-normal mt-0 " title="Petugas">
                                    <i class="mdi mdi-account"></i>
                                    Jumlah petugas</h5>
                                <h3 class="my-2 py-1">{{ $petugas }}</h3>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            <div class="col-md-4 col-xl-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row align-items-center">
                            <div class="col-12">
                                <h5 class="text-muted fw-normal mt-0 " title="Total pengaduan">
                                    <i class="mdi mdi-file-document"></i>
                                    total pengaduan</h5>
                                <h3 class="my-2 py-1">{{ $semua }}</h3>
                            </div>
                        </div> <!-- end row-->
                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div> <!-- end col -->
            @endif
        </div>
        <!-- end row -->
        
            <div class="card mt-3">
                <div class="card-header">
                    <h3>Pengaduan terbaru</h3>
                </div>
                <div class="card-body">
                    {{-- <a class="btn btn-success mb-2" href="/admin/tambahpetugas">Tambah Data</a> --}}
                    <div class="tab-content">
                        <div class="tab-pane show active" id="buttons-table-preview">
                            <table id="scroll-vertical-datatable" class="table dt-responsive nowrap w-100">
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
                                                href="{{ route('petugas.showLaporan') }}">lihat</a>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        <!-- end row-->

    </div> <!-- container -->

</div>
<!-- content -->
@endsection
