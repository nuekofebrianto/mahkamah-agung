@extends('base.app')
@section('main')
    <div class="card card-sidebar">
        <div class="card-body">
            <div class="card-title text-center">
                <h4>
                    Sistem Informasi Layanan Manejemen Insiden Mahkamah Agung RI
                </h4>
                <br>
                <img src="{{ asset('/img/logo_ma.jpeg') }}" alt="" height="125" width="125">

            </div>
        </div>
    </div>
    <br>
    <div class="card">

        <div class="card-body card-history-insiden undisplay">

            <div class="row">
                <div class="col-md-8 offset-2">
                    <h5 class="text-center">
                        Status Pengajuan Insiden
                    </h5>
                    <br>
                    <div class="row">
                        <div class="col-md-12 data-nomor-tiket">
                        </div>
                    </div>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4 text-center data-diterima">
                            <span>Data diterima</span><br>
                            <button class="btn btn-outline-warning btn-icon rounded-circle">
                                <i class="ti-thumb-up fs-3"></i>
                            </button>
                        </div>
                        <div class="col-md-4 text-center data-ditangani">
                            <span>Data ditangani</span><br>

                        </div>
                        <div class="col-md-4 text-center data-selesai">
                            <span>Data selesai</span><br>

                        </div>

                    </div>
                    <br>
                    <br>
                    <div class="row text-center">
                        <div class="col-md-12">
                            <button class="btn btn-outline-primary" onclick="lihatPengaduan()" id="lihatPengaduan">lihat
                                pengaduan</button>
                        </div>
                    </div>
                    <br>
                </div>
            </div>

            @if($data > 0)
            <div class="row lihat-pengaduan undisplay fs-5">
                <div class="col-md-8 offset-2">
                    <div class="row ">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Kode Error</label>
                                :
                                <span>{{ $pengajuan->kode_error }}</span>
                            </div>
                        </div>

                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Aplikasi</label>
                                :
                                <span>{{ $pengajuan->aplikasi->nama }}</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">penjelasan insiden</label>
                            :
                            <span>{{ $pengajuan->penjelasan_insiden }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">satker organisasi</label>
                            :
                            <span>{{ $pengajuan->satker_organisasi }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">satker organisasi</label>
                            :
                            <span>{{ $pengajuan->satker_organisasi }}</span>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Tingkat Prioritas</label>
                                :
                                <span>{{ $pengajuan->aplikasi->nama }}</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Kategori perbaikan</label>
                                :
                                <span>{{ $pengajuan->kategori_perbaikan->nama }}</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Perbaikan</label>
                                :
                                <span>{{ $pengajuan->perbaikan }}</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">

                            <div class="form-group">
                                <label for="">Alasan</label>
                                :
                                <span>{{ $pengajuan->alasan }}</span>
                            </div>

                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12">
                            <label for="">Status</label>
                            :
                            <span>{{ $pengajuan->status }}</span>
                        </div>
                    </div>
                </div>
            </div>
            @endif

        </div>
        <hr>

        <div class="card-body card-cari-insiden">

            <div class="row">
                <div class="col-md-6 offset-3">
                    <h5 class="text-center">
                        Layanan Pengajuan Insiden
                    </h5>
                    <br>
                    <div class="form-group">
                        <label for="">Kode Error</label>
                        <input type="text" class="form-control" id="kodeError">
                    </div>
                    <br>
                    <div class="text-end">
                        <button class="btn btn-secondary btn-sm" onclick="pengajuanInsiden()"
                            id=btnPengajuan>Pengajuan</button>
                        <button class="btn btn-primary btn-sm" onclick="cariInsiden()">Cari</button>
                    </div>
                </div>
            </div>
        </div>


        <div class="card-body card-hasil-insiden undisplay">

            <div class="row">
                <div class="col-md-4 offset-4">
                    <h5 class="text-center">
                        Layanan Pengajuan Insiden
                    </h5>
                    <br>
                    <div class="form-group">
                        <label for="">Kode Error</label>
                        <input type="text" class="form-control" hasil="kode_error">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="">Penjelasan</label>
                        <input type="text" class="form-control" hasil="penjelasan">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="">Penyelesaian</label>
                        <textarea class="form-control" cols="30" rows="10" hasil="penyelesaian"></textarea>
                    </div>
                    <div class="text-center " id="statusKodeError">
                        <span class="badge super-badge fs-5 bg-secondary"></span>
                    </div>
                    <br>
                    <div class="text-end">
                        <button class="btn btn-primary btn-sm" onclick="selesai()">Selesai</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="card-body card-inputan-insiden undisplay">


            <div class="row">
                <div class="col-md-6 offset-3">
                    <input type="text" class="form-control undisplay" store="id">
                    <div class="row">
                        <div class="col-md-12 m-b-2">
                            <div class="form-group">
                                <label class="control-label">Kode error</label>
                                <input type="text" class="form-control" store="kode_error">
                            </div>
                        </div>
                        <div class="col-md-12 m-b-2">
                            <div class="form-group">
                                <label class="control-label">Aplikasi</label>
                                <select class="form-control select2" store="aplikasi_id">
                                    @foreach ($aplikasi as $value)
                                        <option value="{{ $value->id }}">{{ $value->nama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-2">
                            <div class="form-group">
                                <label class="control-label">Penjelasan insiden</label>
                                <textarea rows="10" cols="30" class="form-control" store="penjelasan_insiden"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12 m-b-2">
                            <div class="form-group">
                                <label class="control-label">Satker organisasi</label>
                                <input type="text" class="form-control" store="satker_organisasi">
                            </div>
                        </div>

                        <div class="col-md-12 m-b-2">


                            <div class="text-center position-relative">

                                <form action="/uploadbuktiinsiden" enctype="multipart/form-data" method="POST"
                                    id="formUploadBuktiInsiden">
                                    <input type="text" class="form-control undisplay" store_file="id" name="id">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                    <input type="file" class="form-control" store_file="bukti_insiden"
                                        id="uploadBuktiInsiden" placeholder="upload bukti" name="files">
                                </form>

                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-md-6 offset-3 text-end">
                    <button type="button" class="btn btn-primary btn-sm" onclick="selesai()">Kembali</button>
                    <button type="button" class="btn btn-secondary btn-sm" onclick="simpanLayanan()">simpan</button>
                </div>
            </div>

        </div>


        <style>
            .m-b-2 {
                margin-bottom: 20px;
            }
        </style>
    @endsection

    @section('js')
        <script>
            const pengajuan = JSON.parse('<?php echo json_encode($pengajuan); ?>');

            console.log(pengajuan)

            function lihatPengaduan() {
                if ($('.lihat-pengaduan').hasClass('undisplay')) {
                    $('.lihat-pengaduan').removeClass('undisplay')
                    $('#lihatPengaduan').html('sembunyikan')
                } else {
                    $('.lihat-pengaduan').addClass('undisplay')
                    $('#lihatPengaduan').html('lihat pengaduan')
                }
            }

            if (pengajuan != null) {
                $('#btnPengajuan').remove()
                $('.card-history-insiden').removeClass('undisplay')
                $('.data-nomor-tiket').append('<h5>Nomor Tiket anda : ' + pengajuan['id'] + '</h5>')
                if (pengajuan['status'] == 'ditangani') {
                    $('.data-ditangani').append(`<button class="btn btn-outline-primary btn-icon rounded-circle">
                                <i class="ti-check fs-3"></i>
                            </button>`)
                    $('.data-selesai').append(`<button class="btn btn-secondary btn-sm" onclick="selesaiInsiden(` + pengajuan[
                        'id'] + `)">
                               Selesai
                            </button>`)
                }

            }


            var breadCrumb = [{
                url: '/home',
                nama: 'Dashboard'
            }];

            function selesaiInsiden(id) {
                Swal.fire({
                    title: 'Selesaikan Insiden ?',
                    text: 'anda yakin !?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Tidak',
                    cancelButtonText: 'Ya',
                    customClass: {
                        confirmButton: 'btn btn-secondary m-r-2',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: false
                }).then((result) => {
                    if (!result.isConfirmed) {

                        $('.loader').show()
                        $.ajax({
                            headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            },
                            url: 'selesaiinsiden',
                            method: 'post',
                            data: {
                                id: id
                            },
                            success: function(response) {
                                notif('Berhasil selesaikan insiden', 'success');

                                window.location = '/home';


                            }
                        })
                        $('.loader').hide()
                    }
                });
            }

            function simpanLayanan() {
                $('.loader').show()

                kode_error = $('[store="kode_error"]').val()
                aplikasi_id = $('[store="aplikasi_id"]').val()
                penjelasan_insiden = $('[store="penjelasan_insiden"]').val()
                satker_organisasi = $('[store="satker_organisasi"]').val()
                bukti_insiden = $('[store_file="bukti_insiden"]').val()

                $('[store]').removeClass('is-invalid')
                $('[store_file]').removeClass('is-invalid')

                ada_error = 0
                if (kode_error == '') {
                    $('[store="kode_error"]').addClass('is-invalid')
                    ada_error = 1
                }
                if (aplikasi_id == '') {
                    $('[store="aplikasi_id"]').addClass('is-invalid')
                    ada_error = 1
                }
                if (penjelasan_insiden == '') {
                    $('[store="penjelasan_insiden"]').addClass('is-invalid')
                    ada_error = 1
                }
                if (satker_organisasi == '') {
                    $('[store="satker_organisasi"]').addClass('is-invalid')
                    ada_error = 1
                }
                if (bukti_insiden == '') {
                    $('[store_file="bukti_insiden"]').addClass('is-invalid')
                    ada_error = 1
                }

                if (ada_error == 1) {
                    notif('Lengkapi data !', 'danger')
                    $('.loader').hide()
                    return false;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'layanan',
                    method: 'POST',
                    data: {
                        kode_error: kode_error,
                        aplikasi_id: aplikasi_id,
                        penjelasan_insiden: penjelasan_insiden,
                        satker_organisasi: satker_organisasi,
                        status: 'diterima'
                    },
                    success: function(response) {
                        $('[store_file="id"').val(response.id)
                        $('#formUploadBuktiInsiden').submit()
                        notif('berhasil simpan data !', 'success')
                        $('.loader').hide()
                        window.location = '/home';

                    },
                    error: function(response) {
                        message = ''
                        $('[store]').removeClass('is-invalid')
                        $('[store_file]').removeClass('is-invalid')
                        $.each(response.responseJSON.errors, function(i, v) {
                            message = v[0]
                            $('[store="' + i + '"]').addClass('is-invalid')
                        })
                        notif(message, 'danger')
                        $('.loader').hide()

                    }
                })
            }

            function pengajuanInsiden() {
                $('.card-hasil-insiden').addClass('undisplay')
                $('.card-inputan-insiden').removeClass('undisplay')
                $('.card-cari-insiden').addClass('undisplay')
                $('[store="kode_error"]').val('')
                $('[store="penjelasan_insiden"]').val('')
                $('[store="satker_organisasi"]').val('')
            }

            function cariInsiden() {
                $('.loader').show()
                kode_error = $('#kodeError').val()
                $('#kodeError').removeClass('is-invalid')

                if (kode_error == '') {
                    notif('isi inputan kode error !', 'danger')
                    $('#kodeError').addClass('is-invalid')
                    $('.loader').hide()
                    return false;
                }

                $.ajax({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    url: 'carikodeerror',
                    method: 'POST',
                    data: {
                        kode_error: kode_error
                    },
                    success: function(response) {
                        console.log(response)
                        if (response.kode_error == undefined) {
                            notif('kode error "' + kode_error + '" tidak ditemukan !', 'danger')
                        } else {
                            $('.card-hasil-insiden').removeClass('undisplay')
                            $('.card-inputan-insiden').addClass('undisplay')
                            $('.card-cari-insiden').addClass('undisplay')
                            $('[hasil="kode_error"]').val(response.kode_error)
                            $('[hasil="penjelasan"]').val(response.penjelasan)
                            $('[hasil="penyelesaian"]').val(response.penyelesaian)
                            $('#statusKodeError').html(response.status)

                            if (response.status == 'pending') {
                                $('[hasil="penjelasan"]').parent().addClass('undisplay')
                                $('[hasil="penyelesaian"]').parent().addClass('undisplay')
                                $('#statusKodeError').html(`
                        <span class="badge super-badge fs-5 bg-warning" >` + response.status + `</span>
                            `)
                            }

                            if (response.status == 'progress') {
                                $('[hasil="penjelasan"]').parent().addClass('undisplay')
                                $('[hasil="penyelesaian"]').parent().addClass('undisplay')
                                $('#statusKodeError').html(`
                        <span class="badge super-badge fs-5 bg-primary" >` + response.status + `</span>
                            `)
                            }

                            if (response.status == 'ok') {
                                $('[hasil="penjelasan"]').parent().addClass('undisplay')
                                $('[hasil="penyelesaian"]').parent().addClass('undisplay')
                                $('#statusKodeError').html(`
                        <span class="badge super-badge fs-5 bg-secondary" >` + response.status + `</span>
                            `)
                            }

                        }

                        $('.loader').hide()

                    }
                })

            }

            function selesai() {
                $('.card-hasil-insiden').addClass('undisplay')
                $('.card-inputan-insiden').addClass('undisplay')
                $('.card-cari-insiden').removeClass('undisplay')
                $('#kodeError').val('')
                $('#statusKodeError').html('')
            }

            $('#potoProfile').click(function() {
                $('#uploadPotoProfile').click()
            })

            $('#formUploadBuktiInsiden').submit(function(e) {
                e.preventDefault();

                $('.loader').show()

                var formData = new FormData(this);

                var urltarget = "/uploadbuktiinsiden"

                $.ajax({

                    type: 'POST',
                    url: urltarget,
                    data: formData,
                    cache: false,
                    contentType: false,
                    processData: false,
                    success: function(response) {
                        $('.loader').hide()
                    },
                    error: function(response) {
                        $('.loader').hide()

                    }
                })

            })

            $(document).on("change", "#uploadBuktiInsiden", function() {

                fileName = $(this).get(0).files[0].name;
                fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
                fileSize = this.files.size;

                if ((fileNameExt != 'jpg') && (fileNameExt != 'jpeg')) {
                    $('#uploadAfter').val('')
                    Swal.fire({
                        title: 'Upload File',
                        text: 'Format yang di perbolehkan (jpg/JPEG) !',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Ya',
                        customClass: {
                            confirmButton: 'btn btn-primary mr-2',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })

                    return false;
                }

                if (fileSize > 5000000) {
                    $('#uploadAfter').val('')
                    Swal.fire({
                        title: 'Upload File',
                        text: 'Ukuran yang di perbolehkan (5Mb) !',
                        icon: 'warning',
                        showCancelButton: false,
                        confirmButtonText: 'OK',
                        cancelButtonText: 'Ya',
                        customClass: {
                            confirmButton: 'btn btn-primary mr-2',
                            cancelButton: 'btn btn-danger'
                        },
                        buttonsStyling: false
                    })


                    return false;
                }



            });
        </script>
    @endsection
