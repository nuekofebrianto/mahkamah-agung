<script>
    var breadCrumb = [{
            url: "/home",
            nama: "Dashboard"
        },
        {
            url: "/kode_error",
            nama: "Kode Error"
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
                '" onclick=getData(this)><i class="ti-pencil"></i>Lihat / Ubah</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                '" onclick=hapusData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];
    
    dataColum.push({
        data: 'kode_error',
        name: 'kode_error',
        label: 'Kode error'
    })
    dataColum.push({
        data: 'penjelasan',
        name: 'penjelasan',
        label: 'Penjelasan'
    })
    dataColum.push({
        data: 'penyelesaian',
        name: 'penyelesaian',
        label: 'Penyelesaian'
    })
    dataColum.push({
        data: 'status',
        name: 'status',
        label: 'Status'
    })
    reload(url + "/list")
</script>
