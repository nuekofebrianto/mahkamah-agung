<div class="card h-100 card-form undisplay">
    <div class="card-header d-flex align-items-center border-0">
        <div class="me-auto">
            <h3 class="h4 m-0">Insiden</h3>
        </div>
        <div class="toolbar-end">
            <button type="button" class="btn btn-warning btn-sm" id="kembali" onclick="backToIndex()">
                kembali
            </button>


        </div>
    </div>

    <div class="card-body">

        <div class="row">
            <div class="col-md-6">

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">No Tiket</label>
                            <input type="text" class="form-control" store="id" readonly>
                        </div>
                    </div>
                </div>
                <br>

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Aplikasi</label>
                            <input type="text" class="form-control undisplay" store="aplikasi_id">
                            <input type="text" class="form-control" aplikasi_id="aplikasi_id" readonly>
                            {{-- <select class="form-control select2" store="aplikasi_id" readonly>
                                    @foreach ($aplikasi as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select> --}}
                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Satker organisasi</label>
                            <input type="text" class="form-control" store="satker_organisasi" readonly>
                        </div>
                    </div>
                </div>
                <br>


            </div>
            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label class="control-label">Penjelasan insiden</label>
                            <textarea rows="10" cols="30" class="form-control" store="penjelasan_insiden" readonly></textarea>
                        </div>
                    </div>
                </div>
                <br>
                <div class="row justify-content-center">
                    <div class="col-md-4 text-center border-primary">
                        <a href="" target="blank">
                            <img src="" store_file="bukti_insiden" alt="">
                        </a>
                    </div>

                </div>
            </div>
        </div>

        <hr>
        <div class="row">
            <div class="col-md-12 text-end">
                <button class="btn-primary btn btn-sm" onclick="penanganan()">tangani</button>
            </div>
        </div>
        <div class="row  penanganan undisplay">
            <div class="col-md-6">
                <div class="row">
                    <div class="me-auto">
                        <h3 class="h4 m-0">Penanganan</h3>
                    </div>
                    <div class="col-md-12">
                        <br>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Kode error</label>
                                    <input type="text" class="form-control" store="kode_error">
                                </div>
                            </div>
                            <br>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Tingkat prioritas</label>
                                    <select class="form-control select2" store="tingkat_prioritas_id">
                                        @foreach ($tingkat_prioritas as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label class="control-label">Kategori perbaikan</label>
                                    <select class="form-control select2" store="kategori_perbaikan_id">
                                        @foreach ($kategori_perbaikan as $value)
                                            <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <label for="">upload bukti perbaikan</label>
                                <form action="/uploadbuktiperbaikan" enctype="multipart/form-data" method="POST"
                                    id="formUploadBuktiInsiden">
                                    <input type="text" class="form-control undisplay" store_file="id" name="id">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="file" class="form-control" store_file="bukti_insiden"
                                        id="uploadBuktiInsiden" placeholder="upload bukti" name="files">
                                </form>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Perbaikan</label>
                                    <textarea rows="10" cols="30" class="form-control" store="perbaikan"></textarea>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label class="control-label">Alasan</label>
                                    <textarea rows="10" cols="30" class="form-control" store="alasan"></textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-12 text-start">
                        <button type="button" class="btn btn-mint btn-sm undisplay" id="ubah"
                            onclick="ubahData()">
                            simpan
                        </button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 text-center">
                <a href="" target="blank">
                    <img src="" alt="" id="bukti_perbaikan">
                </a>

            </div>
        </div>
    </div>
</div>
