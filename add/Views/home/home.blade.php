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
                        <a href="/layanan" class="btn btn-secondary btn-sm">Pengajuan</a>
                        <button class="btn btn-primary btn-sm" onclick="cariInsiden()">Cari</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-body card-hasil-insiden undisplay">

            <div class="row">
                <div class="col-md-6 offset-3">
                    <h5 class="text-center">
                        Layanan Pengajuan Insiden
                    </h5>
                    <br>
                    <div class="form-group">
                        <label for="">Kode Error</label>
                        <input type="text" class="form-control" store="kode_error">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="">Penjelasan</label>
                        <input type="text" class="form-control" store="penjelasan">
                    </div>
                    <br>

                    <div class="form-group">
                        <label for="">Penyelesaian</label>
                        <textarea class="form-control" cols="30" rows="10" store="penyelesaian"></textarea>
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
    </div>
@endsection

@section('js')
    <script>
        var breadCrumb = [{
            url: '/home',
            nama: 'Dashboard'
        }];

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
                        $('.card-cari-insiden').addClass('undisplay')
                        $('[store="kode_error"]').val(response.kode_error)
                        $('[store="penjelasan"]').val(response.penjelasan)
                        $('[store="penyelesaian"]').val(response.penyelesaian)
                        $('#statusKodeError').html(response.status)

                        if (response.status == 'pending') {
                            $('[store="penjelasan"]').parent().addClass('undisplay')
                            $('[store="penyelesaian"]').parent().addClass('undisplay')
                            $('#statusKodeError').html(`
                        <span class="badge super-badge fs-5 bg-warning" >` + response.status + `</span>
                            `)
                        }

                        if (response.status == 'progress') {
                            $('[store="penjelasan"]').parent().addClass('undisplay')
                            $('[store="penyelesaian"]').parent().addClass('undisplay')
                            $('#statusKodeError').html(`
                        <span class="badge super-badge fs-5 bg-primary" >` + response.status + `</span>
                            `)
                        }

                        if (response.status == 'ok') {
                            $('[store="penjelasan"]').parent().addClass('undisplay')
                            $('[store="penyelesaian"]').parent().addClass('undisplay')
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
            $('.card-cari-insiden').removeClass('undisplay')
            $('#kodeError').val('')
            $('#statusKodeError').html('')
        }
    </script>
@endsection
