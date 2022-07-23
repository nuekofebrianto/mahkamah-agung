@extends("base.app")
    @section("main")
    <div class="card h-100 card-index">
        <div class="card-header d-flex align-items-center border-0">
            <div class="me-auto">
                <h3 class="h4 m-0">List</h3>
            </div>
            <div class="toolbar-end">
                <button type="button" class="btn btn-primary btn-xs" id="dataBaru" onclick="openFormBaru()">
                    data baru
                </button>
            </div>
        </div>
    
        <div class="card-body">
            <div class="row">
                <div class="col-md-12" id="templateTable">
                    <table id="datatable" class="table dataTable">
                        <thead>
                            <tr>
                                <th width="40">no</th><td>Nama</td>
</tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
        @include("kategori_perbaikan.form")
    @endsection
    @section("js")
        @include("kategori_perbaikan.js_dt")
        @include("kategori_perbaikan.js_crud")
        @include("kategori_perbaikan.js_custom")
    @endsection