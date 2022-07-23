<script>
    var breadCrumb = [{
            url: '/home',
            nama: 'Dashboard'
        },
        {
            url: '/menu',
            nama: 'List Menu'
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
                // '<a class="dropdown-item list-group-item text-primary" href="#" data-id="' + full.id +
                // '" onclick=editData(this)><i class="ti-pencil"></i>Lihat / Ubah</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                '" onclick=deleteData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];

    dataColum.push({
        data: 'url',
        name: 'url',
        label: 'url'
    })

    dataColum.push({
        data: 'nama',
        name: 'nama',
        label: 'nama'
    })

    dataColum.push({
        data: 'tipe',
        name: 'tipe',
        label: 'tipe'
    })

    reload('/menumaster/list')

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

    $('#nama').on('keyup', function() {

        kecil = getKecil($(this).val())
        besar = getBesar($(this).val())

        $('#url').val('/' + kecil)
        $('#namaKecil').val(kecil)
        $('#namaBesar').val(besar)
    })

    function selaluHurufKecil(ini){
        value = getKecil($(ini).val())
        $(ini).val(value)
    }

   function getKecil(text){

        valKecil = text.toLowerCase()

        value = valKecil.replace('_', ' ')
        value = valKecil.replace('-', ' ')

        val1 = hurufKecil(value)

        namaKecil = val1.replace(/ /g, "_");

        kecil = namaKecil.replace(/[^a-z0-9_]/gi, '');
        return kecil

   }

   function getBesar(text){

        valBesar = text
        valKecil = text.toLowerCase()

        value = valKecil.replace('_', ' ')
        value = valKecil.replace('-', ' ')

        val1 = hurufKecil(value)
        val2 = hurufBesar(val1)

        besar = val2.replace(/[^a-z0-9_]/gi, '');
        return besar

}
    

    function hurufBesar(string) {
        return string.replace(/(?:^|\s)\S/g, function(a) {
            return a.toUpperCase();
        });
    };

    function hurufKecil(string) {
        return string.replace(/(?:^|\s)\S/g, function(a) {
            return a.toLowerCase();
        });
    };

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

    function tambahRow() {
        baris = parseInt($('#kolomTable>tbody>tr').length) + 1

        var templateRow = ` <tr>
                                        <td class="text-end va-m p-r-2">` + baris +
            `</td>
                                        <td>
                                            <select class="form-control" kolom="tipe" onchange="changeTipeColumn(this)">
                                                <option value="text" selected>text</option>
                                                <option value="numeric">numeric</option>
                                                <option value="decimal">decimal</option>
                                                <option value="date">date</option>
                                                <option value="time">time</option>
                                                <option value="datetime">datetime</option>
                                                <option value="area">area</option>
                                                <option value="relasi">relasi</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" kolom="nama" onblur="selaluHurufKecil(this)">
                                        </td>
                                        <td>
                                            <input type="text" class="form-control" kolom="default">
                                        </td>
                                        <td>
                                            <select class="form-control undisplay" kolom="coma">
                                                <option value="0" selected>no ,</option>
                                                <option value="1">, 1</option>
                                                <option value="2">, 2</option>
                                                <option value="3">, 3</option>
                                                <option value="4">, 4</option>
                                            </select>
                                        </td>
                                        <td class="checkbox text-center">
                                            <input class="magic-checkbox collection" type="checkbox" kolom="required" checked>
                                        </td>
                                        <td class="checkbox text-center">
                                            <input class="magic-checkbox collection" type="checkbox" kolom="unique">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control" value="0" kolom="min" min="0">
                                        </td>
                                        <td>
                                            <input type="number" class="form-control"  value="0" kolom="max" min="0">
                                        </td>
                                        
                                        <td width="50" class="text-center va-m">
                                            <button class="btn btn-danger btn-icon rounded-circle btn-xs" onclick="hapusRow(this)">
                                                <i class="ti-close"></i>
                                            </button>
                                        </td>
                                    </tr>`;

        $('#kolomTable>tbody').append(templateRow)

    }

    function hapusRow(ini) {
        $(ini).parent().parent().remove()
        $('#kolomTable>tbody>tr').each(function(i, v) {
            let baris = parseInt(i) + 1
            $(v).children(':first-child()').html(baris)
        })
    }

    function changeTipeColumn(ini){
        let value       = $(ini).val()
        let next        = $(ini).parent().next()
        let next2       = $(ini).parent().next().next()
        let nextComa    = $(ini).parent().next().next().next()
        let inputText   = '<input type="text" class="form-control" kolom="nama" onblur="selaluHurufKecil(this)">';
        let inputText2  = '<input type="text" class="form-control" kolom="default">';
        let inputSelect = `<select class="form-control select2" kolom="nama" onchange="getColumn(this)">
                                                <option value="">pilih table</option>
                                                @foreach($tables as $value)
                                                    <option value="{{$value->$db_name}}">{{$value->$db_name}}</option>
                                                @endforeach
                                            </select>`;
        let inputSelect2 =`<select class="form-control" kolom="default"></select>`;
        if (value == 'relasi'){
            $(next).html('')
            $(next2).html('')
            $(next).append(inputSelect)
            $(next2).append(inputSelect2)
            $(nextComa).children().addClass('undisplay')
        }
        else if (value == 'decimal'){
            $(nextComa).children().removeClass('undisplay')
        }
        else {
            $(next).html('')
            $(next2).html('')
            $(next).append(inputText)
            $(next2).append(inputText2)
            $(nextComa).children().addClass('undisplay')
        }
        reSet();
    }

    function getColumn(ini) {
        let value = $(ini).val()
        $(ini).parent().next().children().html('')
        let next = $(ini).parent().next().children()

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/menumaster/getcolumn',
            method: 'POST',
            data: {
                table_name: value
            },
            success: function(response) {
                let option = ''
                $.each(response, function(i, v) {
                    option = option + `<option value="`+v.Field+`">`+v.Field+`</option>`
                })
                $(next).append(option)
            }
        })
    }

    function simpanDataMenu() {

        $('.loader').show();

        var requestData = {}
        var headerData = {}
        var detailData = []
        var data = {}

        headerData['tipe'] = 'master'
        headerData['nama'] = $('#nama').val()
        headerData['url'] = $('#url').val()
        headerData['namaKecil'] = $('#namaKecil').val()
        headerData['namaBesar'] = $('#namaBesar').val()
        headerData['akses'] = [];
      
        collection = {}

        $('.collection[bagian="akses"]').each(function(i, v) {
            if ($(v).prop('checked')) {
                collection['role_id'] = $(v).parent().prev().attr('role_id')
                collection['lihat'] = true
                collection['tambah'] = $(v).parent().next().children().prop('checked')
                collection['ubah'] = $(v).parent().next().next().children().prop('checked')
                collection['hapus'] = $(v).parent().next().next().next().children().prop('checked')
                // collection['download'] = $(v).parent().next().next().next().next().children().prop('checked')
                headerData['akses'].push(collection)
                collection = {}
            }
        })


        $('#kolomTable>tbody>tr').each(function(i,v){
            data['tipe'] = $(v).children().children('[kolom="tipe"]').val()
            data['nama'] = $(v).children().children('[kolom="nama"]').val()
            data['default'] = $(v).children().children('[kolom="default"]').val()
            data['required'] = $(v).children().children('[kolom="required"]').prop('checked')
            data['unique'] = $(v).children().children('[kolom="unique"]').prop('checked')
            data['min'] = $(v).children().children('[kolom="min"]').val()
            data['max'] = $(v).children().children('[kolom="max"]').val()
            data['coma'] = $(v).children().children('[kolom="coma"]').val()
            data['nama_besar'] = getBesar(data['nama'])
            detailData.push(data)
            data = {}
        })
        requestData['headerData'] = headerData
        requestData['detailData'] = detailData

        if (headerData['nama'] == ''){
            notif('Harap isi Nama Menu !','danger')
            $('#nama').addClass('is-invalid')
                    $('.loader').hide();
            return false
        }

        if (requestData['detailData'].length == 0){
            notif('Harap isi detail kolom !','danger')
            $('#nama').removeClass('is-invalid')
                    $('.loader').hide();
            return false
        }

        var unique_values = {};
        var list_of_values = [];
        $.each(detailData,function(i,v) {
            if (v.tipe != 'relasi'){
                if ( list_of_values.includes(v.nama) == false) {
                    
                    list_of_values.push(v.nama);
                } else {
                    notif('Selain Relasi , Kolom tidak boleh Sama !','danger')
                    $('#nama').removeClass('is-invalid')
                    $('.loader').hide();
                    return false
                }
            }
    });

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: '/menumaster',
            method: 'POST',
            data: requestData,
            success: function(response) {
                console.log(response)

                if (response.length == undefined){
                    // notif('Gagal '+ response.original.errors.errorInfo[2], 'danger')
                    notif('Gagal ', 'danger')
                }
                else{
                    notif('Berhasil', 'success')
                    reload('/menumaster/list')
                    backToIndex()
                    clearForm()
                }
                $('.loader').hide();

            }
        })
    }

    function deleteData(ini) {

        let ids = [];
        ids.push($(ini).attr('data-id'));
        sidebar = $('.mainnav__categoriy').find('[url="/test_2"]').parent().html()

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
                    url:'/menumaster/ids',
                    method: 'delete',
                    data: {
                        ids: ids,
                        sidebar:sidebar
                    },
                    success: function(response) {
                        console.log(response)
                        notif('Berhasil hapus data', 'warning');

                        reload('/menumaster/list')

                    }
                })
                $('.loader').hide()
            }
        });
}
</script>
