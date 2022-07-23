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
                <div class="col-md-8 offset-2">
                    <input type="text" class="form-control undisplay" store="id">

                    <div class="form-group">
                        <label class="control-label">Role</label>
                        <select class="form-control select2" store="role_id">
                            @foreach ($role as $value)
                                <option value="{{ $value->id }}">{{ $value->nama }}</option>
                            @endforeach
                        </select>
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Username</label>
                        <input type="text" class="form-control" store="username">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Email</label>
                        <input type="email" class="form-control" store="email">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Password</label>
                        <input type="password" class="form-control" store="password" autocomplete="off">
                    </div>
                    <br>
                    <div class="form-group">
                        <label class="control-label">Password Confirm</label>
                        <input type="password" class="form-control" store="password-confirm" autocomplete="off">
                    </div>
                </div>
            </div>


        </form>
    </div>

</div>
