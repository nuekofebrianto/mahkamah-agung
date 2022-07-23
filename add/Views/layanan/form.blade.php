<div class="card h-100 card-form undisplay">
    <div class="card-header d-flex align-items-center border-0">
        <div class="me-auto">
            <h3 class="h4 m-0">Data Baru</h3>
        </div>
        <div class="toolbar-end">
            <button type="button" class="btn btn-warning btn-xs" id="kembali" onclick="backToIndex()">
                kembali
            </button>
            &nbsp;
            &nbsp;
            &nbsp;
            <button type="button" class="btn btn-mint btn-xs undisplay" id="simpan" onclick="simpanData()">
                simpan
            </button>
            <button type="button" class="btn btn-mint btn-xs undisplay" id="ubah" onclick="ubahData()">
                simpan
            </button>
        </div>
    </div>

    <div class="card-body">
        <form id="templateForm">

            <div class="row">
                <div class="col-md-12">
                    <input type="text" class="form-control undisplay" store="id">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Kode error</label>
                                {{-- <select class="form-control select2" store="kode_error_id">
                                    @foreach ($kode_error as $value)
                                        <option value="{{ $value->id }}">{{ $value->kode_error }}</option>
                                    @endforeach
                                </select> --}}
                                <input type="text" class="form-control" store="kode_error">

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Aplikasi</label>
                                <select class="form-control select2" store="aplikasi_id">
                                    @foreach ($aplikasi as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Tanggal layanan</label>
                                <input type="text" class="form-control datepicker" store="tanggal_layanan">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Nomor Layanan</label>
                                <input type="text" class="form-control" store="nomor_antrian">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Satker organisasi</label>
                                <input type="text" class="form-control" store="satker_organisasi">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="control-label">Keterangan layanan</label>
                                <textarea rows="10" cols="30" class="form-control" store="keterangan_layanan"></textarea>
                            </div>
                        </div>
                       
                    </div>
                </div>
        </form>
    </div>
</div>
