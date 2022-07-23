<script>
    // CRUD FUNCTION
    // --------------------------------------------------------------------------------------------------------------------------------

    function openFormBaru() {
        $('.card-index').addClass('undisplay')
        $('.card-form').removeClass('undisplay')
        $('#simpan').removeClass('undisplay')
    }

    function openFormUbah() {
        $('.card-index').addClass('undisplay')
        $('.card-form').removeClass('undisplay')
        $('#ubah').removeClass('undisplay')
    }

    function backToIndex() {
        $('.card-form').addClass('undisplay')
        $('.card-index').removeClass('undisplay')
        $('#simpan').addClass('undisplay')
        $('#ubah').addClass('undisplay')
    }

    function clearForm() {
        $('[store').val('') //textbox
    }

    function simpanData() {
        postData = {}

        $('[store]').not('[store="id"]').each(function(i, v) {
            post = $(v).attr('store')
            data = $(v).val()

            postData[post] = data
        })

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: 'POST',
            data: postData,
            success: function(response) {

                console.log(response)
                notif('Berhasil', 'success')
                reload(url + '/list')
                backToIndex()
                clearForm()
            },
            error: function(response) {
                message = ''
                $('[store]').removeClass('is-invalid')
                $.each(response.responseJSON.errors, function(i, v) {
                    message = v[0]
                    $('[store="' + i + '"]').addClass('is-invalid')
                })
                notif(message, 'danger')
                $('.loader').hide()

            }
        })
    }

    function hapusData(ini) {

        let ids = [];
        ids.push($(ini).attr('data-id'));

        Swal.fire({
            title: 'Hapus Data',
            text: 'data tidak dapat dikembalikan !',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Tidak',
            cancelButtonText: 'Ya',
            customClass: {
                confirmButton: 'btn btn-primary m-r-2',
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
                    url: url + '/ids',
                    method: 'delete',
                    data: {
                        ids: ids
                    },
                    success: function(response) {
                        notif('Berhasil hapus data', 'warning');

                        reload(url + '/list')

                    }
                })
                $('.loader').hide()
            }
        });
    }


    function getData(ini) {

        id = $(ini).attr('data-id');

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + '/getdata',
            method: 'POST',
            data: {
                id: id
            },
            success: function(response) {

                openFormUbah()
                $.each(response, function(i, v) {
                    if ($('[store="' + i + '"]').hasClass('select2')) {
                        $('[store="' + i + '"]').val(v).trigger('change');
                    } else {
                        $('[store="' + i + '"]').val(v)
                    }
                })
            }
        })

    }

    function ubahData() {
        $('.loader').show()

        postData = {}

        $('[store]').each(function(i, v) {
            post = $(v).attr('store')
            data = $(v).val()

            postData[post] = data
        })

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + '/id',
            method: 'PATCH',
            data: postData,
            success: function(response) {

                console.log(response)

                notif('Berhasil ubah data', 'success')
                reload(url + '/list')
                backToIndex()
                clearForm()
                $('.loader').hide()

            },
            error: function(response) {
                message = ''
                $('[store]').removeClass('is-invalid')
                $.each(response.responseJSON.errors, function(i, v) {
                    message = v[0]
                    $('[store="' + i + '"]').addClass('is-invalid')
                })
                notif(message, 'danger')
                $('.loader').hide()

            }
        })
    }
</script>
