@extends('base.app')
@section('main')
    <div class="row">
        <div class="col-md-6 offset-3">


            <div class="card h-100 card-form">
                <div class="card-header d-flex align-items-center border-0">
                    <div class="me-auto">
                        <h3 class="h4 m-0">Profile</h3>
                    </div>
                    <div class="toolbar-end">
                        <button type="button" class="btn btn-mint btn-xs" id="ubah" onclick="ubahData()">
                            simpan
                        </button>
                    </div>
                </div>

                <div class="card-body">
                    <div id="templateForm">

                        <div class="row">
                            <div class="col-md-8 offset-2">

                                <div class="text-center position-relative">
                                    <div class="pb-3 poto-container">
                                        <img class="btn btn-mint btn-xs rounded-circle"
                                            src="/upload/profile-photos/{{ $datas->id }}.jpg" alt="Profile Picture"
                                            loading="lazy" style="height: 300px;width:300px;" id="potoProfile">
                                    </div>
                                    <br>
                                    <form action="/uploadpotoprofile" enctype="multipart/form-data" method="POST"
                                        id="formUploadPotoProfile">

                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="file" id="uploadPotoProfile" class="undisplay" name="files">
                                        <input type="text" class="form-control undisplay" store="id"
                                            value="{{ $datas->id }}" name="id">
                                    </form>
                                    <p class="text-muted">{{ $datas->role->nama }}</p>
                                </div>


                                <div class="form-group undisplay">
                                    <label class="control-label">Role</label>
                                    <input type="text" store="role_id" value="{{ $datas->role_id }}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Username</label>
                                    <input type="text" class="form-control" store="username"
                                        value="{{ $datas['username'] }}">
                                </div>
                                <br>
                                <div class="form-group">
                                    <label class="control-label">Email</label>
                                    <input type="email" class="form-control" store="email"
                                        value="{{ $datas['email'] }}">
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
    @include('user.profile_js')
@endsection
