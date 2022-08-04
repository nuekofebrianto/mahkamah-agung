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
            let defaultContent = baris
            return defaultContent;
        }
    }];
    dataColum.push({
        id: null,
        'render': function(data, type, full, meta) {
            return moment(full.created_at).format('DD MMM yyyy');
        }
    });

    dataColum.push({
        id: null,
        label: 'no',
        className: 'text-center',
        "render": function(data, type, full, meta) {
            var content = '';
            if (full.status == 'diterima') {
                content = `<span class ="badge fs-6 bg-danger">diterima</span>`
            }
            if (full.status == 'ditangani') {
                content = `<span class ="badge fs-6 bg-primary">ditangani</span>`
            }
            if (full.status == 'selesai') {
                content = `<span class ="badge fs-6 bg-secondary">selesai</span>`
            }
            return content;
        }
    });
    dataColum.push({
        data: 'id',
        name: 'id',
        label: 'No Tiket'
    })
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
        data: 'penjelasan_insiden',
        name: 'penjelasan_insiden',
        label: 'Penjelasan insiden'
    })
    dataColum.push({
        data: 'satker_organisasi',
        name: 'satker_organisasi',
        label: 'Satker organisasi'
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

    function excel() {
        $('.buttons-excel').click()
        console.log('excel')
    }
</script>
