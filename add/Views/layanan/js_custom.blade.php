<script>
    var breadCrumb = [{
            url: "/home",
            nama: "Dashboard"
        },
        {
            url: "/layanan",
            nama: "Layanan"
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
                '" onclick=getData(this)><i class="ti-pencil"></i>History</a>' +
                '<a class="dropdown-item list-group-item text-danger" href="#" status="' + full.status_layanan +'" data-id="' + full.id +
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
        data: 'aplikasi.nama',
        name: 'aplikasi.nama',
        label: 'Aplikasi'
    })
    dataColum.push({
        id: null,
        'render': function(data, type, full, meta) {
            return moment(full.tanggal_layanan).format('DD MMM yyyy');
        }
    });
    dataColum.push({
        data: 'nomor_antrian',
        name: 'nomor_antrian',
        label: 'Nomor antrian'
    })
    dataColum.push({
        data: 'satker_organisasi',
        name: 'satker_organisasi',
        label: 'Satker organisasi'
    })
    dataColum.push({
        data: 'keterangan_layanan',
        name: 'keterangan_layanan',
        label: 'Keterangan layanan'
    })
    dataColum.push({
        id: null,
        class : "text-center",
        'render': function(data, type, full, meta) {
            var result = '';
            if (full.status_layanan == 'pending') {
                result = '<span class="badge super-badge bg-warning fs-6">pending</span>'
            } else if (full.status_layanan == 'progress') {
                result = '<span class="badge super-badge bg-primary fs-6">progress</span>'
            } else {
                result = '<span class="badge super-badge bg-secondary fs-6">ditangani</span>'
            }

            return result;
        }
    });
    reload(url + "/list")
</script>
