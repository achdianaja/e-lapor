@extends('layouts.admin.master')

@section('title','Detail Pengaduan')

@section('adminContent')
<div class="container-fluid">
    <div class="edit-profile">
        <div class="mt-3">
            <div class="card">
                <div class="card-header pb-0">
                    <h4 class="card-title mb-0">Pengaduan</h4>
                    <div class="card-options"><a class="card-options-collapse" href="#"
                            data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                            class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                class="fe fe-x"></i></a></div>
                </div>
                <div class="card-body">
                    <div class="row mb-2">

                        <div class="col-lg-3">
                            <h4 class="mb-1 f-20 txt-primary">{{ $pengaduan->judul_laporan }}</h4>
                        </div>

                        <div class="col-lg-2">
                            <h6 class="form-label"> Pada {{ $pengaduan->tgl_pengaduan->format('l,Y h:i') }}</h6>
                        </div>

                        <div class="col-lg-6 text-end">
                            @if ($pengaduan->status == '0')
                            <span class="badge bg-danger text-white">Pending</span>
                            @elseif ($pengaduan->status == 'proses')
                            <span class="badge bg-warning text-white">Proses</span>
                            @else
                            <span class="badge bg-success text-white">Selesai</span>
                            @endif
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Dari : </label>
                            <span class="text">{{ $pengaduan->user->nama }}</span>
                        </div>
                        <div class="mb-3">
                            <p>{{ $pengaduan->isi_laporan }}</p>
                        </div>
                        <div class="mb-3 d-lg-flex d-none justify-content-center">


                            @foreach ($pengaduan->images as $item)

                            <img src="/storage/{{ $item->image_path }}"
                                alt="{{ 'Gambar '.$item->judul_laporan }}" class="img-fluid avatar-xl p-2 gambar-lampiran"
                                data-bs-toggle="modal" data-bs-target="#imageModal"
                                data-src="/storage/{{ $item->image_path}}">
                            @endforeach
                            <!-- Modal image -->

                            <div class="modal fade" id="imageModal" tabindex="-1" role="dialog"
                                aria-labelledby="imageModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered" role="document">
                                    <div class="modal-content modal-ctn">
                                        <div class="modal-body text-center">
                                            <img id="modalImage" src="" alt="" style="max-width: 100%; height: auto;">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            {{-- end modal image --}}
                        </div>
                    </div>

                    <hr>
                    <div class="mb-3">
                        <form action="/admin/tanggapan/createOrUpdate" method="POST">
                            @csrf
                            <input type="hidden" name="id_pengaduan" value="{{ $pengaduan->id_pengaduan }}">
                            <div class="pb-0">
                                <h4 class="card-title mb-0">Beri Tanggapan</h4>
                                <div class="card-options"><a class="card-options-collapse" href="#"
                                        data-bs-toggle="card-collapse"><i class="fe fe-chevron-up"></i></a><a
                                        class="card-options-remove" href="#" data-bs-toggle="card-remove"><i
                                            class="fe fe-x"></i></a></div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control btn-square">
                                                @if ($pengaduan->status == '0')
                                                <option selected value="0">Pending</option>
                                                <option value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                                @elseif ($pengaduan->status == 'proses')
                                                <option value="0">Pending</option>
                                                <option selected value="proses">Proses</option>
                                                <option value="selesai">Selesai</option>
                                                @else
                                                <option value="0">Pending</option>
                                                <option value="proses">Proses</option>
                                                <option selected value="selesai">Selesai</option>
                                                @endif

                                            </select>
                                        </div>
                                    </div>

                                    <div class="col-md-12">
                                        <div>
                                            <label class="form-label">Tanggapan</label>
                                            <textarea class="form-control" name="tanggapan" rows="5"
                                                placeholder="Beri tanggapan"
                                                id="simplemde1">{{ $tanggapan->tanggapan ?? '' }}</textarea>
                                        </div>
                                    </div>
                                    @if (session('success'))
                                    <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                        <strong>Selamat !
                                        </strong>
                                        <button class="btn-close" type="button" data-bs-dismiss="alert"
                                            aria-label="Close" data-bs-original-title="" title=""></button>
                                        {{ session('success') }}
                                    </div>
                                    @endif
                                </div>
                            </div>
                            <div class="">
                                <button class="btn btn-primary form-control text-white" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
