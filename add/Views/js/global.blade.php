<script>
    const baseUrl = 'loaclhost:8000'

    const basicInfo = JSON.parse('<?php echo json_encode($basicInfo); ?>')
    console.log(basicInfo)
    const url = basicInfo.infoMenu.url

    $(document).ready(function() {

        setBreadCrumb(breadCrumb)
        setSideBar(basicInfo)
        reSet()

        $('.loader').hide()


    });

    // setting breadcrumb
    function setBreadCrumb(path) {
        let currentPage = ''
        $('ol.breadcrumb').html('')
        $.each(path, function(i, v) {
            if (v.url != '#') {
                $('ol.breadcrumb').append(`<li class="breadcrumb-item"><a href="` + v.url + `">` + v.nama +
                    `</a></li>`)
            } else {
                $('ol.breadcrumb').append(`<li class="breadcrumb-item">` + v.nama +
                    `</li>`)
            }
            $('h1.page-title').text(v.nama)
            currentPage = v.nama
        })
        $('ol.breadcrumb').children('li:last-child').addClass('active')
        $('ol.breadcrumb').children('li:last-child').attr('aria-current', 'page')
        $('ol.breadcrumb').children('li:last-child').html(currentPage)
    }

    // option pas klik row datatable
    $(document).mouseup(function(e) {
        setpositionmenu(e);
        var container = $(".rowId");
        if (!container.is(e.target) && container.has(e.target).length === 0) {
            container.hide();
            $('.rowId').removeClass('isShow')
        } else {
            container.hide();
        }
    });

    function setpositionmenu(e) {
        var bodyOffsets = document.body.getBoundingClientRect();
        tempX = e.pageX - bodyOffsets.left;
        tempY = e.pageY;
        var p = $('.table').scrollLeft();

        $(".rowId").css({
            'left': tempX + 20 + p
        });
        $(".rowId").css({
            'top': tempY - 10 + p
        });

    }

    function setSideBar(basicInfo) {

        role_akses = basicInfo['infoUser'].role_akses
        if (basicInfo['infoUser'].id > 2) {
            $('[url]').addClass('access-denied')
            $.each(role_akses, function(i, v) {
                $('[url="' + v.url + '"]').removeClass('access-denied')
            })
            $('.access-denied').parent().remove()
            $('ul').children().not('li').remove()

            $('.mininav-content.nav').each(function(i, v) {
                if ($(v).children().length == 0) {
                    $(v).parent().remove()
                }
            })

            $('.mainnav__categoriy>.mainnav__menu').each(function(i, v) {
                if ($(v).children().length == 0) {
                    $(v).parent().remove()
                }
            })


        }
    }

    function reSet() {
        $('.select2').select2();
        if ($('.select2').hasClass('is-invalid')) {
            $('.select2').next().find('.select2-selection').addClass('select2-is-invalid')
        }

        $('.datepicker').datepicker({
            uiLibrary: 'bootstrap4',
            modal: false,
            footer: false,
            autoclose: true,
            format: "dd-mm-yyyy",
            "setDate": new Date(),
        });

        $(".money").each(function() {
            new AutoNumeric(this, {
                watchExternalChanges: true,
                allowDecimalPadding: false
            });
        });

    }

    function addCommas(nStr) {
        nStr += '';
        var x = nStr.split('.');
        var x1 = x[0];
        var x2 = x.length > 1 ? '.' + x[1] : '';
        var rgx = /(\d+)(\d{3})/;
        while (rgx.test(x1)) {
            x1 = x1.replace(rgx, '$1' + ',' + '$2');
        }
        return x1 + x2;
    }
</script>
