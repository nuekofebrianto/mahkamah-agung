<script>
   
   const menu = JSON.parse('<?php echo json_encode($menu); ?>')

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
            url: '/role',
            nama: 'Role'
        }
    ]


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
                '" onclick=getDataRole(this)><i class="ti-pencil"></i>Lihat / Ubah</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                '" onclick=deleteData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];

    dataColum.push({
        data: 'nama',
        name: 'nama',
        label: 'nama'
    })

    reload(url + '/list')

    $.each(menu, function(i, v) {
        $('#aksesTable>tbody').append(`
        <tr  >
            <td class="text-end p-r-2">` + (parseInt(i) + 1) + `</td>
            <td>` + v.nama + `</td>
            <td>` + v.url + `</td>
            <td class="checkbox text-center">
				<input id="akses` + v.id + `" bagian="akses" url="` + v.url + `" class="magic-checkbox collection" type="checkbox">
            </td>
            <td class="checkbox text-center">
				<input id="create` + v.id + `" bagian="create" class="magic-checkbox collection" type="checkbox">
            </td>
            <td class="checkbox text-center">
				<input id="read` + v.id + `" bagian="read" class="magic-checkbox collection" type="checkbox">
            </td>
            <td class="checkbox text-center">
				<input id="update` + v.id + `" bagian="update" class="magic-checkbox collection" type="checkbox">
            </td>
           
        </tr>
        `)
    })

    $('#checkAksesAll').change(function() {
        if ($(this).prop('checked')) {
            $('td>.magic-checkbox').prop('checked', true)
        } else {
            $('td>.magic-checkbox').prop('checked', false)
        }
    })

    $('[bagian="akses"]').change(function() {
        if ($(this).prop('checked')) {
            $(this).parent().next().children().prop('checked', true)
            $(this).parent().next().next().children().prop('checked', true)
            $(this).parent().next().next().next().children().prop('checked', true)
            $(this).parent().next().next().next().next().children().prop('checked', true)
        } else {
            $(this).parent().next().children().prop('checked', false)
            $(this).parent().next().next().children().prop('checked', false)
            $(this).parent().next().next().next().children().prop('checked', false)
            $(this).parent().next().next().next().next().children().prop('checked', false)
        }
    })

    function clearFormRole() {
        $('[store="nama"').val('')
        $('#checkAksesAll').prop('checked', false).change()
    }

    function simpanRole() {

        nama = $('[store="nama"]').val()

        postDataDetail = []
        collection = {}

        $('.collection[bagian="akses"]').each(function(i, v) {
            if ($(v).prop('checked')) {
                collection['url'] = $(v).attr('url')
                collection['lihat'] = true
                collection['tambah'] = $(v).parent().next().children().prop('checked')
                collection['ubah'] = $(v).parent().next().next().children().prop('checked')
                collection['hapus'] = $(v).parent().next().next().next().children().prop('checked')
                // collection['download'] = $(v).parent().next().next().next().next().children().prop('checked')
                postDataDetail.push(collection)
                collection = {}
            }
        })

        if (postDataDetail.length == 0) {
            notif('Check minimal 1 akses', 'danger');
            return false
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url,
            method: 'POST',
            data: {
                nama: nama,
                postDataDetail: postDataDetail
            },
            success: function(response) {

                notif('Berhasil simpan data', 'success');
                reload(url + '/list')
                backToIndex()
                clearFormRole()

            },
            error: function(response) {
                notif('Gagal terjadi kesalahan', 'danger');
            }
        })
    }

    function getDataRole(ini) {

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
                $('[store="id"').val(response.role[0].id)
                $('[store="nama"').val(response.role[0].nama)

                $.each(response.role_akses, function(i, v) {
                    $('input[url="' + v.url + '"]').prop('checked', v.lihat)
                    $('input[url="' + v.url + '"]').parent().next().children().prop('checked', v
                        .tambah)
                    $('input[url="' + v.url + '"]').parent().next().next().children().prop(
                        'checked', v.ubah)
                    $('input[url="' + v.url + '"]').parent().next().next().next().children().prop(
                        'checked', v.hapus)
                })

            }
        })

    }

    function ubahRole() {

        id = $('[store="id"]').val()
        nama = $('[store="nama"]').val()

        postDataDetail = []
        collection = {}

        $('.collection[bagian="akses"]').each(function(i, v) {
            if ($(v).prop('checked')) {
                collection['url'] = $(v).attr('url')
                collection['lihat'] = true
                collection['tambah'] = $(v).parent().next().children().prop('checked')
                collection['ubah'] = $(v).parent().next().next().children().prop('checked')
                collection['hapus'] = $(v).parent().next().next().next().children().prop('checked')
                // collection['download'] = $(v).parent().next().next().next().next().children().prop('checked')
                postDataDetail.push(collection)
                collection = {}
            }
        })

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + '/{id}',
            method: 'PATCH',
            data: {
                id: id,
                nama: nama,
                postDataDetail: postDataDetail
            },
            success: function(response) {

                notif('Berhasil ubah data', 'success');
                reload(url + '/list')
                backToIndex()
                clearFormRole()

            }
        })
    }
</script>
