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
                            <span class="display-5">{{ $layanan }}</span>
                            <p>Total Gangguan</p>
                            <i class="ti-headphone-alt fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-warning text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{ $layananDiterima }}</span>
                            <p>Total Diterima</p>
                            <i class="ti-thumb-up fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-primary text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{ $layananDitangani }}</span>
                            <p>Total Ditangani</p>
                            <i class="ti-check fs-4"></i>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="card bg-secondary text-white mb-3 mb-xl-1">
                        <div class="p-3 text-center">
                            <span class="display-5">{{ $layananSelesai }}</span>
                            <p>Total Selesai</p>
                            <i class="ti-face-smile fs-4"></i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <br>
    <div class="card">
        <div class="card-body ">
            <div class="row">
                <div class="col-md-6 offset-3">
                    <h4>Grafik Layanan Insiden</h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-6 offset-3">
                    <canvas id="myChart" class="text-center"></canvas>

                </div>
            </div>

        </div>
    </div>

    <style>
        /* #myChart {
                        height: 300px !important;
                        width: 500px !important;
                    } */
    </style>
@endsection

@section('js')
    <script src="{{ asset('libraries/chart/chart.min.js') }}"></script>

    <script>
        var breadCrumb = [{
            url: '/homemanajer',
            nama: 'Dashboard'
        }];


        const layanan = '<?php echo $layanan; ?>';
        const layananDiterima = '<?php echo $layananDiterima; ?>';
        const layananDitangani = '<?php echo $layananDitangani; ?>';
        const layananSelesai = '<?php echo $layananSelesai; ?>';

        const layananMonth = JSON.parse('<?php echo json_encode($layananMonth); ?>');
        const layananDiterimaMonth = JSON.parse('<?php echo json_encode($layananDiterimaMonth); ?>');
        const layananDitanganiMonth = JSON.parse('<?php echo json_encode($layananDitanganiMonth); ?>');
        const layananSelesaiMonth = JSON.parse('<?php echo json_encode($layananSelesaiMonth); ?>');


        var dataChart = [layanan, layananDiterima, layananDitangani, layananSelesai];
        var dataLabel = ['total gangguan', 'diterima', 'ditangani', 'selesai'];

        var dataPeriode = ['Januari', 'Februai', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustur', 'September', 'Oktober',
            'November', 'Desember'
        ];

        var dataColor = ['rgb(223,86,69)', 'rgb(250,159,27)', 'rgb(34,122,210)', 'rgb(38,166,154)'];

        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: dataPeriode,
                datasets: [{
                    label: 'Total',
                    data: layananMonth,
                    backgroundColor: dataColor[0],
                    borderColor: dataColor[0],
                    borderWidth: 1
                },
                {
                    label: 'Diterima',
                    data: layananDiterimaMonth,
                    backgroundColor: dataColor[1],
                    borderColor: dataColor[1],
                    borderWidth: 1
                }
                ,
                {
                    label: 'Ditangani',
                    data: layananDitanganiMonth,
                    backgroundColor: dataColor[2],
                    borderColor: dataColor[2],
                    borderWidth: 1
                }
                ,
                {
                    label: 'Selesai',
                    data: layananSelesaiMonth,
                    backgroundColor: dataColor[3],
                    borderColor: dataColor[3],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
@endsection
