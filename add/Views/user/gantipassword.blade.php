@extends('base.app')
@section('main')
    <div class="row">
        <div class="col-md-6 offset-3">


            <div class="card h-100 card-form">
                <div class="card-header d-flex align-items-center border-0">
                    <div class="me-auto">
                        <h3 class="h4 m-0">{{$datas->username}}</h3>
                    </div>
                    <div class="toolbar-end">
                        <button type="button" class="btn btn-mint btn-xs" id="ubah" onclick="updatePassword()">
                            simpan
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="templateForm">

                        <div class="row">
                            <div class="col-md-8 offset-2">

                                <input type="text" class="form-control undisplay" store="id"
                                    value="{{ $datas->id }}" name="id">
                                <div class="form-group">
                                    <label class="control-label">Password Saati ini</label>
                                    <input type="password" class="form-control" store="current-password">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Password Baru</label>
                                    <input type="password" class="form-control" store="new-password">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Konfirmasi Password</label>
                                    <input type="password" class="form-control" store="confirm-password">
                                </div>
                                <br>
                            </div>
                        </div>


                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection

@section('js')
    @include('user.gantipassword_js')
@endsection
