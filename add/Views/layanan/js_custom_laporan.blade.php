<script src="{{ asset('libraries/chart/chart.min.js') }}"></script>

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

    function lihatData() {
        $('.loader').show()
        periodeAwal = $('#periodeAwal').val()
        periodeAkhir = $('#periodeAkhir').val()

        if (periodeAwal == '' || periodeAkhir == '') {
            notif('isi dulu periode !', 'danger')
            $('.loader').hide()
            return false
        }

        reload(url + "/listlaporan", periodeAwal, periodeAkhir)

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            url: url + '/datalaporan',
            method: 'POST',
            data: {
                periodeAwal: periodeAwal,
                periodeAkhir: periodeAkhir
            },
            success: function(response) {

                console.log(response)

                var layanan = response.layanan;
                var layananDiterima = response.layananDiterima;
                var layananDitangani = response.layananDitangani;
                var layananSelesai = response.layananSelesai;

                var dataChart = [layanan, layananDiterima, layananDitangani, layananSelesai];
                var dataLabel = ['total gangguan', 'diterima', 'ditangani', 'selesai'];

                var dataPeriode = ['Layanan', 'Diterima', 'Ditangani', 'Selesai'];

                var dataColor = ['rgb(223,86,69)', 'rgb(250,159,27)', 'rgb(34,122,210)', 'rgb(38,166,154)'];

                $('#myChart').remove()

                $('.canvas-container').append(`
                <canvas id="myChart" class="text-center"></canvas>
                `)

                var ctx = document.getElementById('myChart').getContext('2d');

                var myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: dataPeriode,
                        datasets: [{
                                label: 'Layanan',
                                data: dataChart,
                                backgroundColor: dataColor,
                                borderColor: dataColor,
                                borderWidth: 1
                            },
                            {
                                label: 'Diterima',
                                backgroundColor: dataColor[1],
                                borderColor: dataColor[1],
                                borderWidth: 1
                            }
                            ,
                            {
                                label: 'Ditangani',
                                backgroundColor: dataColor[2],
                                borderColor: dataColor[2],
                                borderWidth: 1
                            }
                            ,
                            {
                                label: 'Selesai',
                                backgroundColor: dataColor[3],
                                borderColor: dataColor[3],
                                borderWidth: 1
                            }
                        ]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        }
                    }
                });

                $('.loader').hide()
            },
            error: function(response) {

                $('.loader').hide()

            }
        })
        $('.loader').hide()

    }

    function tampilkanGrafik(){
        if ($('.card-grafik').hasClass('undisplay')){
            $('#lihatGrafik').html('Sembumyikan Grafik')
            $('.card-grafik').removeClass('undisplay')
        }
        else{
            $('#lihatGrafik').html('Tampilkan Grafik')
            $('.card-grafik').addClass('undisplay')
        }
    }

    function excel() {
        $('.buttons-excel').click()
        console.log('excel')
    }
</script>
