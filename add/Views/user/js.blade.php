<script>
   
    var breadCrumb = [{
            url: '/home',
            nama: 'Dashboard'
        },
        {
            url: '#',
            nama: 'Master'
        },
        {
            url: '#',
            nama: 'Akses'
        },
        {
            url: '/user',
            nama: 'User'
        }
    ]
    setBreadCrumb(breadCrumb)

    var dataColum = [{
        id: null,
        label: 'no',
        className: 'text-end p-r-2',
        "render": function(data, type, full, meta) {
            let baris = meta.row + 1;
            let defaultContent = baris +
                '<div class="list-group">' +
                '<div class="animated bounceIn rowId" rowId="' + full.id + '">' +
                '<a class="dropdown-item list-group-item text-primary" href="#" data-id="' + full.id +
                '" onclick=getData(this)><i class="ti-pencil"></i>Lihat / Ubah</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                '" onclick=hapusData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];

    dataColum.push({
        data: 'role.nama',
        name: 'role.nama',
        label: 'role'
    })
    dataColum.push({
        data: 'username',
        name: 'username',
        label: 'username'
    })
    dataColum.push({
        data: 'email',
        name: 'email',
        label: 'email'
    })

    reload(url + '/list')


    function openFormBaru() {
        clearForm()
        $('.card-index').addClass('undisplay')
        $('.card-form').removeClass('undisplay')
        $('#simpan').removeClass('undisplay')
        $('[store="password"]').parent().removeClass('undisplay')
        $('[store="password-confirm"]').parent().removeClass('undisplay')
        // $('[store="username"]').removeAttr('readonly')
        $('[store]').removeClass('is-invalid')
    }

    function openFormUbah() {
        $('.card-index').addClass('undisplay')
        $('.card-form').removeClass('undisplay')
        $('#ubah').removeClass('undisplay')
        $('[store="password"]').parent().addClass('undisplay')
        $('[store="password-confirm"]').parent().addClass('undisplay')
        // $('[store="username"]').attr('readonly', true)
        $('[store]').removeClass('is-invalid')

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
        $('.loader').show()

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
                    $('[store="' + i + '"]').val(v)
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

                notif('Berhasil', 'success')
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
