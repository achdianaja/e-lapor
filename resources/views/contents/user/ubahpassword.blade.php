@extends('layouts.user.master')


@section('content')

<section class="py-5">
    <div class="container">
        <div class="row py-4">
            <div class="col-lg-12">
                <div class="text-center">
                    {{-- <h1 class="mt-3 "><i class="mdi mdi-infinity"></i></h1>s --}}
                    <h3 class="text-dark">Silahkan ubah password anda</h3>
                    <h4 class="text-dark">Pastikan password yang anda ubah diingat dengan baik!</h4>
                </div>
            </div>
        </div>

        <form action="/updatepassword/{{ $masyarakat->nik }}" method="post">
        <div class="row g-2">
                @csrf
            <div class="mb-3 col-xl-6">
                <label for="password" class="form-label">Password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Ketikan password"
                        name="password">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                    @error('password')
                    <div class="invalid-feedback position-absolute start-0 top-100">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            <div class="mb-3 col-xl-6">
                <label for="password" class="form-label">Konfirmasi password</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Konfirmasi password"
                        name="password_confirmation">
                    <div class="input-group-text" data-password="false">
                        <span class="password-eye"></span>
                    </div>
                    @error('password')
                    <div class="invalid-feedback position-absolute start-0 top-100">
                        {{ $message }}
                    </div>
                    @enderror
                </div>
            </div>

            
        </div>
        <div class="mb-3 text-end">
            <button type="submit" class="btn btn-primary">Ubah</button>
        </div>
    </form>
    </div>
</section>
@endsection
