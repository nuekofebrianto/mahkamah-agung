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
                '" onclick=getData(this)><i class="ti-pencil"></i>detail</a>' +
                // '<a class="dropdown-item list-group-item text-danger" href="#" data-id="' + full.id +
                // '" onclick=hapusData(this)>Hapus</a>' +
                '</div>';
            return defaultContent;
        }
    }];
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

    function penanganan() {
        $('#ubah').removeClass('undisplay')

        if ($('.penanganan').hasClass('undisplay')) {
            $('.penanganan').removeClass('undisplay')
        } else {
            $('.penanganan').addClass('undisplay')
        }
    }

    $('#potoProfile').click(function() {
        $('#uploadPotoProfile').click()
    })

    $('#formUploadBuktiInsiden').submit(function(e) {
        e.preventDefault();

        $('.loader').show()

        var formData = new FormData(this);

        var urltarget = "/uploadbuktiperbaikan"

        $.ajax({

            type: 'POST',
            url: urltarget,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                $('.loader').hide()
                console.log('upload success')
            },
            error: function(response) {
                $('.loader').hide()

            }
        })

    })

    $(document).on("change", "#uploadBuktiInsiden", function() {

        fileName = $(this).get(0).files[0].name;
        fileNameExt = fileName.substr(fileName.lastIndexOf('.') + 1);
        fileSize = this.files.size;

        if ((fileNameExt != 'jpg') && (fileNameExt != 'jpeg')) {
            $('#uploadAfter').val('')
            Swal.fire({
                title: 'Upload File',
                text: 'Format yang di perbolehkan (jpg/JPEG) !',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'OK',
                cancelButtonText: 'Ya',
                customClass: {
                    confirmButton: 'btn btn-primary mr-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })

            return false;
        }

        if (fileSize > 5000000) {
            $('#uploadAfter').val('')
            Swal.fire({
                title: 'Upload File',
                text: 'Ukuran yang di perbolehkan (5Mb) !',
                icon: 'warning',
                showCancelButton: false,
                confirmButtonText: 'OK',
                cancelButtonText: 'Ya',
                customClass: {
                    confirmButton: 'btn btn-primary mr-2',
                    cancelButton: 'btn btn-danger'
                },
                buttonsStyling: false
            })


            return false;
        }



    });
</script>
