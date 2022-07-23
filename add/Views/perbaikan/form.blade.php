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
                        <div class="row"><div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Layanan (nomor antrian)</label>
                    <select class="form-control select2" store="layanan_id">
                        @foreach ($layanan as $value)
                            <option value="{{ $value->id }}">{{ $value->nomor_antrian }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Tingkat prioritas</label>
                    <select class="form-control select2" store="tingkat_prioritas_id">
                        @foreach ($tingkat_prioritas as $value)
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Kategori perbaikan</label>
                    <select class="form-control select2" store="kategori_perbaikan_id">
                        @foreach ($kategori_perbaikan as $value)
                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                        @endforeach
                    </select>
                </div>
                </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Perbaikan</label>
                    <textarea rows="10" cols="30"  class="form-control" store="perbaikan"></textarea>
                </div>
            </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Alasan</label>
                    <textarea rows="10" cols="30"  class="form-control" store="alasan"></textarea>
                </div>
            </div>
</div>
                </div>
                </form>
            </div>
    </div>
