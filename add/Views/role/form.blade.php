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
            <button type="button" class="btn btn-mint btn-xs undisplay" id="simpan" onclick="simpanRole()">
                simpan
            </button>
            <button type="button" class="btn btn-mint btn-xs undisplay" id="ubah" onclick="ubahRole()">
                simpan
            </button>
        </div>
    </div>

    <div class="card-body">
        <div id="templateForm">

            <div class="row">
                <div class="col-md-8 offset-2">
                    <input type="text" class="form-control undisplay" store="id" >

                    <div class="form-group">
                        <label class="control-label">Nama Role</label>
                        <input type="text" class="form-control" store="nama">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-8 offset-2">
                    <table class="table" id="aksesTable">
                        <thead>
                            <tr>
                                <th class="checkbox text-center">
                                    <input id="checkAksesAll" class="magic-checkbox" type="checkbox">
                                </th>
                                <th>menu</th>
                                <th>url</th>
                                <th class="text-center">access</th>
                                <th class="text-center">create</th>
                                <th class="text-center">update</th>
                                <th class="text-center">delete</th>
                                {{-- <th class="text-center">download</th> --}}
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

</div>