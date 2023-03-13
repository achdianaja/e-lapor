@extends('layouts.user.master')


@section('content')

<section class="py-3">
    <div class="container">
      <div class="row g-2">
        @foreach ($pengaduan as $item)
        <div class="col-lg-4 mt-2">
            <div class="card text-start h-100">
                <div class="card-body">
                    <div class="justify-content-between">
                        <a href="/laporan/{{ $item->id_pengaduan }}/detail"
                            class="h3">{{ $item->judul_laporan }}</a>
                    </div>
                    <div class="py-0">
                        <h3 class="lead">{{ Str::limit($item->isi_laporan, 100) }}</h3>
                    </div>
                        <div class="d-flex justify-content-start">
                            @if ($item->user->foto)
                                
                            <img src="{{ asset($item->foto) }}"
                                class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                            @elseif($item->user->gender == 'perempuan')
                            <img src="/assets/images/avatar/girl.jpg"
                                class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                            @else
                            <img src="/assets/images/avatar/man.jpg"
                                class="card-img img-fluid avatar-xs rounded-circle me-2" alt="...">
                            @endif
                            @if ($item->hide_laporan == 2)
                            <p>Anonymous</p>
                            @else
                            <p>{{ $item->user->nama }}</p>
                            @endif
                        </div>
                </div>
            </div>
        </div>
        @endforeach
      </div>
    </div>
</section>
@endsection
