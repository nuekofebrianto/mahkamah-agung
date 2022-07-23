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
                    <label class="control-label">Kode error</label>
                    <input type="text" class="form-control" store="kode_error">
                </div>
            </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Penjelasan</label>
                    <textarea rows="10" cols="30"  class="form-control" store="penjelasan"></textarea>
                </div>
            </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Penyelesaian</label>
                    <textarea rows="10" cols="30"  class="form-control" store="penyelesaian"></textarea>
                </div>
            </div>
<div class="col-md-3">
                <div class="form-group">
                    <label class="control-label">Status</label>
                    {{-- <input type="text" class="form-control" store="status"> --}}
                    <select class="form-control select2" store="status">
                        <option value="ok">ok</option>
                        <option value="pending">pending</option>
                    </select>
                </div>
            </div>
</div>
                </div>
                </form>
            </div>
    </div>
