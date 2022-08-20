@extends('base.app')
@section('main')
    <div class="card card-index">
        <div class="card-header align-items-center border-0">
            <div class="row">
                <div class="col-md-6">
                    <h3 class="h4 m-0">Laporan</h3>
                </div>
                <div class="text-end col-md-6">
                    <button type="button" class="btn btn-secondary btn-sm" onclick="excel()">
                        Excel
                    </button>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6"></div>
                        <div class="col-md-2">
                            <label for="">Periode</label>
                            <input type="date" class="form-control" id="periodeAwal">
                        </div>
                        <div class="col-md-2">
                            <label for=""></label>
                            <input type="date" class="form-control" id="periodeAkhir">
                        </div>
                        <div class="col-md-2 text-end">
                            <br>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="tampilkanGrafik()">
                                Tampilkan Grafik
                            </button>
                            <button type="button" class="btn btn-secondary btn-sm" onclick="lihatData()">
                                Lihat Data
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <hr>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12" id="templateTable">
                    <table id="datatable" class="table dataTable">
                        <thead>
                            <tr>
                                <th width="40">no</th>
                                <td>Tanggal</td>
                                <td>Status</td>
                                <td>No Tiket</td>
                                <td>Kode error</td>
                                <td>Aplikasi</td>
                                <td>Penjelasan insiden</td>
                                <td>Satker organisasi</td>
                                <td>Tingkat prioritas</td>
                                <td>Kategori perbaikan</td>
                                <td>Perbaikan</td>
                                <td>Alasan</td>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="card card-grafik undisplay" >
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

    @include('layanan.form')
@endsection
@section('js')
    @include('layanan.js_dt_laporan')
    @include('layanan.js_crud')
    @include('layanan.js_custom_laporan')
@endsection
