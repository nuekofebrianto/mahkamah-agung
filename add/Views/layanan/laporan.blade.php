@extends('base.app')
@section('main')
    <div class="card h-100 card-index">
        <div class="card-header d-flex align-items-center border-0">
            <div class="me-auto">
                <h3 class="h4 m-0">Laporan</h3>
            </div>
            <div class="toolbar-end">
                <button type="button" class="btn btn-secondary btn-sm" onclick="excel()">
                   Excel
                </button>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-12" id="templateTable">
                    <table id="datatable" class="table dataTable">
                        <thead>
                            <tr>
                                <th width="40">no</th>
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
    @include('layanan.form')
@endsection
@section('js')
    @include('layanan.js_dt')
    @include('layanan.js_crud')
    @include('layanan.js_custom_laporan')
@endsection
