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
            nama: 'Umum'
        },
        {
            url: '/gudang',
            nama: 'Gudang'
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
        data: 'nama',
        name: 'nama',
        label: 'Nama'
    })

    reload(url + '/list')


</script>