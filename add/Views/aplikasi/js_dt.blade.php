<link rel="stylesheet" href="{{ asset('libraries/Datatables/datatables.min.css') }}">

<script src="{{ asset('libraries/Datatables/datatables.min.js') }}"></script>


<script>
    function reload(urlList) {

        $('#datatable').DataTable().destroy()

        $('#datatable').dataTable({
            "dom": '<"row undisplay"<"col-md-6"B>><"row mb-2"<"col-md-4 "l><"col-md-4 periode"><"col-md-4 text-end"f>>tr<"row justify-content-center"<"col-md-12"p>>',
            // "order": [[ 1, "desc" ]],
            "columnDefs": [{
                targets: 0,
                width: 40,
                orderable: false,
                searchable: false
            }],
            "autoWidth": false,

            "language": {
                "lengthMenu": '<select class="form-control-sm rowperpage">' +
                    '<option value="10">10</option>' +
                    '<option value="20">20</option>' +
                    '<option value="30">30</option>' +
                    '<option value="40">40</option>' +
                    '<option value="50">50</option>' +
                    '<option value="100">100</option>' +
                    '<option value="-1">All</option>' +
                    '</select> data',
                "processing": 'Loading . . .',
                "emptyTable": "Data Kosong",
                "searchPlaceholder": "pencarian",
                "infoEmpty": "tidak ada yang ditampilkan",
                "search": "",
                "zeroRecords": "Pencarian Kosong",

            },
            processing: true,
            serverSide: true,
            ajax: {
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: urlList,
                method: 'post',
                data: {}
            },
            columns: dataColum,
            "fnDrawCallback": function(oSettings) {
                // dtCustom(idtable, urlList);
            },
        })
    }

    function dtCustom(idtable, currentUrl) {
        // $('.filter-datatable').html('')
        // $('.filter-datatable').append(

        //     `<input class="form-control-sm" id="cariData">`+
        //     `<button class="btnx btnx-main" onclick="reload('` + idtable + `','` + urlList + `')">tampilkan</button>`
        // )
        // rowperpage = $('.rowperpage').val()
        // currentpage = $('.current[data-dt-idx]').html()

    }

    $('#templateTable').on('click', '#datatable tbody tr', function(e) {

        let rowId = $(this).find('[rowId]').attr('rowId')
        let isShowCheck = $.find('.rowId.isShow')

        if (isShowCheck.length == 0) {
            let isShow = $(this).find('[rowId]').addClass('isShow')
            $('[rowId="' + rowId + '"]').show()
        } else {
            $('.rowId').removeClass('isShow')
            $(isShowCheck).hide()
        }
    })


  
</script>