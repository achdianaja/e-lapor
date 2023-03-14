@extends('layouts.user.master')

@section('title', 'Detail Laporan')

@section('content')
<!-- START HERO -->
<section class="hero-section">
    <div class="container ">
        <div class="row py-4">
            <div class="col-xl-12">
                <!-- start news feeds -->
                <div class="card">
                    <div class="card-body pb-1">
                        <div class="d-flex">
                            @if ($foto)
                            <img src="{{ asset($foto) }}" class="me-2 rounded" alt="..." height="32">
                            @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                            <img src="/assets/images/avatar/girl.jpg" class="me-2 rounded" alt="..." height="32">
                            @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                            <img src="/assets/images/avatar/man.jpg" class="me-2 rounded" alt="..." height="32">
                            @endif
                            <div class="w-100">
                                <div class="dropdown float-end text-muted">
                                    <a href="#" class="dropdown-toggle arrow-none card-drop" data-bs-toggle="dropdown"
                                        aria-expanded="false">
                                        <i class="mdi mdi-dots-horizontal"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-end">
                                        @if ($pengaduan->status == '0')
                                        <!-- item-->
                                        <a href="/edit/{{$pengaduan->id_pengaduan }}" class="dropdown-item">Edit</a>
                                        <!-- item-->

                                        @endif
                                        <a href="" class="dropdown-item" data-bs-toggle="modal"
                                            data-bs-target="#danger-header-modal">Delete</a>
                                        <!-- item-->
                                        <a href="/laporan" class="dropdown-item">Kembali</a>
                                    </div>
                                </div>
                                <h5 class="m-0">{{ $pengaduan->user->nama }}</h5>
                                <p class="text-muted">
                                    <small>{{ $pengaduan->tgl_pengaduan->format('l, d F Y') }}
                                        <span class="mx-1">⚬</span>
                                        <span>Public</span>
                                        <span class="mx-1">⚬</span>
                                        @if ($pengaduan->status == '0')
                                        <span class="badge badge-danger-lighten"> Pending</span>
                                        @elseif($pengaduan->status == 'proses')
                                        <span class="badge badge-warning-lighten">{{ ucwords($pengaduan->status) }}
                                        </span>
                                        @else
                                        <span class="badge badge-success-lighten">{{ ucwords($pengaduan->status) }}
                                        </span>
                                        @endif
                                    </small></p>
                            </div>
                        </div>

                        <hr class="m-0 mb-3" />

                        <div class="text-dark fw-bold h4">{{ $pengaduan->judul_laporan }}</div>
                        <div class="font-16 text-start text-dark my-3">
                            <i class="mdi mdi-format-quote-open font-20"></i>
                            {{$pengaduan->isi_laporan }}
                        </div>


                        
                        {{-- <div cla
                            ss="text-dark fw-bold h4">{{ $pengaduan->judul_laporan }}
                    </div> --}}
                    <div class="font-16 text-start text-dark my-3">
                        <p>Lokasi kejadian : {{$pengaduan->lokasi_kejadian }}</p>
                    </div>
                    <hr class="m-0 mb-3" />
                    <div class="mb-3 d-lg-flex d-none justify-content-start">
                        <div class="">
                            <div class="">
                                @foreach ($pengaduan->images as $item)
                                <img src="/storage/{{ $item->image_path }}" alt="{{ $item->judul_laporan }}"
                                    class="img-fluid avatar-md">
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <hr class="m-0" />

                    <div class="my-1">
                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted ps-0"><i
                                class='mdi mdi-chat-processing-outline text-danger'></i> Tanggapan</a>
                    </div>

                    <hr class="m-0" />

                    @if ($pengaduan->tanggapan != null)

                    <div class="mt-3">
                        <div class="d-flex">
                            <img class="me-2 rounded" src="/assets/images/avatar/man.jpg"
                                alt="Generic placeholder image" height="32">
                            <div>
                                <h5 class="m-0">{{$pengaduan->tanggapan->petugas->nama_petugas }} </h5>
                                <p class="text-muted mb-0">
                                    <small>{{ optional($pengaduan->tanggapan->tgl_tanggapan)->format('H:i') }}</small>
                                </p>

                                <p class="my-1">{{$pengaduan->tanggapan->tanggapan  }}</p>
                            </div> <!-- end div -->
                        </div> <!-- end d-flex-->

                        <hr />

                        {{-- <div class="d-flex mb-2">
                    @if ($foto)
                    <img src="{{ asset($foto) }}" class="align-self-start rounded me-2" alt="..." height="32">
                        @elseif(Auth::guard('masyarakat')->user()->gender == 'perempuan')
                        <img src="/assets/images/avatar/girl.jpg" class="align-self-start rounded me-2" alt="..."
                            height="32">
                        @elseif(Auth::guard('masyarakat')->user()->gender == 'laki_laki')
                        <img src="/assets/images/avatar/man.jpg" class="align-self-start rounded me-2" alt="..."
                            height="32">
                        @endif
                        <div class="w-100">
                            <input type="text" class="form-control border-0 form-control-sm"
                                placeholder="Write a comment">
                        </div> <!-- end w-100 -->
                    </div> <!-- end d-flex --> --}}
                    @else

                    <div class="text-center my-3">
                        <p>Belum ada tanggapan</p>
                    </div>

                    @endif
                </div>
            </div> <!-- end card-body -->
        </div> <!-- end card -->
    </div>
    </div>
    </div>


    <div id="danger-header-modal" class="modal fade" tabindex="-1" role="dialog"
        aria-labelledby="danger-header-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header modal-colored-header bg-danger">
                    <h4 class="modal-title" id="danger-header-modalLabel">
                        {{ $pengaduan->judul_laporan }}
                    </h4>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5 class="mt-0">Danger Background</h5>
                    <p>Apakah kamu yakin menghapus laporan ini?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Kembali</button>
                    <form action="/destroy/{{$pengaduan->id_pengaduan }}" method="post">
                        @method('delete')
                        @csrf
                        <button type="submit" class="btn btn-danger">Yakin</button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
</section>
<!-- END HERO -->
@endsection
