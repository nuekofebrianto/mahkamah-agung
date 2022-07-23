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
            <button type="button" class="btn btn-mint btn-xs" id="simpan" onclick="simpanDataMenu()">
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
                <div class="col-md-3">
                    <div class="card  border-warning">
                        <div class="card-body">
                            <div class="card-title">
                                <h6>Akses Role</h6>
                            </div>
                            <br>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="30" class="text-center">
                                            <input id="checkAksesAll" class="magic-checkbox collection" type="checkbox">
                                        </th>
                                        <th>Role</th>
                                        <th width="30" class="text-center">
                                            <i class="ti-key fs-3"></i>
                                        </th>
                                        <th width="30" class="text-center">
                                            <i class="ti-plus fs-3"></i>
                                        </th>
                                        <th width="30" class="text-center">
                                            <i class="ti-pencil fs-3"></i>
                                        </th>
                                        <th width="30" class="text-center">
                                            <i class="ti-trash fs-3"></i>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($role as $key => $value)
                                        <tr>
                                            <td class="text-end p-r-2">{{ $key + 1 }}</td>
                                            <td role_id="{{$value->id}}">{{ $value->nama }}</td>
                                            <td class="checkbox text-center">
                                                <input id="akses{{ $key }}" bagian="akses"
                                                    class="magic-checkbox collection" type="checkbox">
                                            </td>
                                            <td class="checkbox text-center">
                                                <input id="create{{ $key }}" bagian="create"
                                                    class="magic-checkbox collection" type="checkbox">
                                            </td>
                                            <td class="checkbox text-center">
                                                <input id="read{{ $key }}" bagian="read"
                                                    class="magic-checkbox collection" type="checkbox">
                                            </td>
                                            <td class="checkbox text-center">
                                                <input id="update{{ $key }}" bagian="update"
                                                    class="magic-checkbox collection" type="checkbox">
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="card  border-success">
                        <div class="card-body">
                            <div class="card-title">

                                <h6>Basic Info</h6>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Nama Menu</label>
                                        <input type="text" class="form-control" id="nama">
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Url</label>
                                        <input type="text" class="form-control" id="url" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Nama Kecil</label>
                                        <input type="text" class="form-control" id="namaKecil" readonly>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label class="control-label">Nama Besar</label>
                                        <input type="text" class="form-control" id="namaBesar" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="card  border-info">
                        <div class="card-body">
                            <div class="card-title">

                                <h6>List Kolom</h6>

                            </div>
                            <br>

                            <table class="table" id="kolomTable">
                                <thead>
                                    <tr style="background:aliceblue;">
                                        <td colspan="5" class="text-center">migration</td>
                                        <td colspan="5" class="text-center">request validation</td>
                                    </tr>
                                    <tr>
                                        <td width="40" class="text-center">no</td>
                                        <td width="100">tipe</td>
                                        <td width="auto">nama</td>
                                        <td width="100">default</td>
                                        <td width="80"></td>
                                        <td width="40" class="text-center">required</td>
                                        <td width="40" class="text-center">unique</td>
                                        <td width="80">min</td>
                                        <td width="80">max</td>
                                        <td width="50" class="text-center">
                                            <button class="btn btn-primary btn-icon rounded-circle btn-xs"
                                                onclick="tambahRow()">
                                                <i class="ti-plus"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </div>

</div>

<style>
    .magic-checkbox {
        font-size: 20px;
        width: 30px;
        height: 18px;
        margin-top: 8px;
    }

    .checkbox {
        text-align: center !important;
    }
</style>
