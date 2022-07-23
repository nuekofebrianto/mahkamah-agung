<script>
   
    var breadCrumb = [{
            url: '/home',
            nama: 'Dashboard'
        },
        {
            url: '/profile',
            nama: 'Profile'
        }
    ]

   


    function backToIndex() {
        $('.card-form').addClass('undisplay')
        $('.card-index').removeClass('undisplay')
        $('#simpan').addClass('undisplay')
        $('#ubah').addClass('undisplay')
    }

    function clearForm() {
        $('[store').val('') //textbox
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


                notif('Berhasil', 'success')

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


    $('#potoProfile').click(function() {
        $('#uploadPotoProfile').click()
    })

    $('#formUploadPotoProfile').submit(function(e) {
        e.preventDefault();

        $('.loader').show()

        var formData = new FormData(this);

        var urltarget = "/uploadpotoprofile"

        $.ajax({

            type: 'POST',
            url: urltarget,
            data: formData,
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                console.log(response)
               
                $("#potoProfile").attr('src',response + '?' + new Date().getTime());
                $("#potoProfileLeftBar").attr('src',response + '?' + new Date().getTime());
                notif('Berhasil ganti photo profile', 'success')
                $('.loader').hide()

            },
            error: function(response) {
                notif('Gagal ganti photo profile', 'danger')
                $('.loader').hide()

            }
        })

    })

    $(document).on("change", "#uploadPotoProfile", function() {

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


        $('#formUploadPotoProfile').submit()

    });
</script>
