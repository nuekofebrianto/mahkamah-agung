<script>
    var breadCrumb = [{
            url: "/home",
            nama: "Dashboard"
        },
        {
            url: "/perbaikan",
            nama: "Perbaikan"
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
        data: 'layanan.nomor_antrian',
        name: 'layanan.nomor_antrian',
        label: 'Layanan'
    })
    dataColum.push({
        data: 'tingkat_prioritas.nama',
        name: 'tingkat_prioritas.nama',
        label: 'Tingkat prioritas'
    })
    dataColum.push({
        data: 'kategori_perbaikan.nama',
        name: 'kategori_perbaikan.nama',
        label: 'Kategori perbaikan'
    })
    dataColum.push({
        data: 'perbaikan',
        name: 'perbaikan',
        label: 'Perbaikan'
    })
    dataColum.push({
        data: 'alasan',
        name: 'alasan',
        label: 'Alasan'
    })
    reload(url + "/list")
</script>
