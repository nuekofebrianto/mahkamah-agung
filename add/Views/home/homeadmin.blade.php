@extends('base.app')
@section('main')
    <div class="card card-sidebar">
        <div class="card-body">
            <div class="card-title text-center">
                <h4>
                    Sistem Informasi Layanan Manejemen Insiden Mahkamah Agung RI
                </h4>
                <br>
                <img src="{{ asset('/img/logo_ma.jpeg') }}" alt="" height="125" width="125">

            </div>
        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <div class="card bg-danger text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{$layanan}}</span>
                            <p>Total Gangguan</p>
                            <i class="ti-headphone-alt fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{$layananDiterima}}</span>
                            <p>Total Diterima</p>
                            <i class="ti-thumb-up fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-primary text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{$layananDitangani}}</span>
                            <p>Total Ditangani</p>
                            <i class="ti-check fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-secondary text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{$layananSelesai}}</span>
                            <p>Total Selesai</p>
                            <i class="ti-face-smile fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>
      
    @endsection

    @section('js')
        <script>

            var breadCrumb = [{
                url: '/homeadmin',
                nama: 'Dashboard'
            }];

                   
        </script>
    @endsection
