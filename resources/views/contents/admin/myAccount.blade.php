@extends('layouts.admin.master')

@section('title','Profile saya')

@section('adminContent')

<div class="row">
    <div class="col-sm-12">
        <!-- Profile -->
        <div class="card bg-info">
            <div class="card-body profile-user-box">
                <div class="row">
                    <div class="col-sm-8">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="avatar-lg">
                                    <img src="/assets/images/avatar/man.jpg" alt="" class="rounded-circle img-thumbnail">
                                </div>
                            </div>
                            <div class="col">
                                <div>
                                    <h4 class="mt-1 mb-1 text-white">{{ Auth::guard('admin')->user()->nama_petugas }}</h4>
                                    <p class="font-13 text-white-50"> {{ Auth::guard('admin')->user()->level }}</p>

                                    <ul class="mb-0 list-inline text-light">
                                        <li class="list-inline-item me-3">
                                            <h5 class="mb-1 text-white">{{ $tanggapan }}</h5>
                                            <p class="mb-0 font-13 text-white-50">Total laporan yang di tanggapi</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col-->

                    <div class="col-sm-4">
                        <div class="text-center mt-sm-0 mt-3 text-sm-end">
                            <a href="/admin/editpetugas/{{ $petugas->id_petugas }}}" type="button" class="btn btn-light">
                                <i class="mdi mdi-account-edit me-1"></i> Edit Profile
                            </a>
                        </div>
                    </div> <!-- end col-->
                </div> <!-- end row -->
            </div> <!-- end card-body/ profile-user-box-->
        </div><!--end profile/ card -->
    </div> <!-- end col-->

    <div class="col-sm-12">
        
        <div class="card">
            <div class="card-body">
                <h1>Profile</h1>
                <hr>
                <div class="row">
                    <div class="col-auto h4">
                        Nama : 
                    </div>

                    <div class="col h4">
                        {{ Auth::guard('admin')->user()->nama_petugas }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto h4">
                        No.tlp : 
                    </div>

                    <div class="col h4">
                        {{ Auth::guard('admin')->user()->telp }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto h4">
                        User Name : 
                    </div>

                    <div class="col h4">
                        {{ Auth::guard('admin')->user()->username }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto h4">
                        Email : 
                    </div>

                    <div class="col h4">
                        {{ Auth::guard('admin')->user()->email }}
                    </div>
                </div>
                <div class="row">
                    <div class="col-auto h4">
                        Level : 
                    </div>

                    <div class="col h4">
                        {{ Auth::guard('admin')->user()->level }}
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
</div>

@endsection