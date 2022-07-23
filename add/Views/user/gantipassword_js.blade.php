<script>
    var breadCrumb = [{
            url: '/home',
            nama: 'Dashboard'
        },
        {
            url: '/gantipassword',
            nama: 'Ganti Password'
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



    function updatePassword() {

        postData = {}

        $('[store]').each(function(i, v) {
            post = $(v).attr('store')
            data = $(v).val()

            postData[post] = data
        })


        Swal.fire({
            title: 'Ganti Password',
            text: 'Pastikan password anda sudah benar !',
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
                    url: '/updatepassword',
                    method: 'POST',
                    data: postData,
                    success: function(response) {

                        notif(response['pesan'], response['icon'])
                        setTimeout(function() {
                            $('.loader').hide()
                            window.location.href = '/home'
                        }, 1000);

                    },
                    error: function(response) {
                        console.log(response)
                        notif(response['pesan'], 'danger')
                        $('.loader').hide()

                    }
                })
            }
        });


    }
</script>
