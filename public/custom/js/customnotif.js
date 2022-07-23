function notif(message,tipe){
    notify('top', 'right', tipe, 'inverse', 'animated fadeInDown', 'animated fadeOutDown',
    'bg-success', '', message);
}

function notify(from, align, icon, type, animIn, animOut, bg, title, message) {
    let iconClass = '';
    if (icon == 'success') { iconClass = 'ti-check-box'; toastTemplate = 'toast-success' }
    else if (icon == 'danger') { iconClass = 'ti-close'; toastTemplate = 'toast-danger' }
    else if (icon == 'warning') { iconClass = 'ti-info-alt'; toastTemplate = 'toast-warning' }

    $.notify({
        icon: icon,
        // title: title,
        // message: message,
        url: ''
    },
        {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            // offset: {
            //     x: 15, // Keep this as default
            //     y: 80  // Unless there'll be alignment issues as this value is targeted in CSS
            // },
            spacing: 10,
            z_index: 10031,
            delay: 1500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:

                `<div class="card toast-custom">
                <div class="`+toastTemplate+`">
                    <div class="row">
                        <div class="col-md-3 toast-icon-`+icon+`">
                            <i class="`+iconClass+`"></i>
                        </div>
                        <div class="col-md-6 toast-body-`+icon+`">
                            `+message+`
                        </div>
                        <div class="col-md-3">
                        </div>
                    </div>
                </div>
            </div>`
        });
}

function closeToast(ini) {
    $(ini).hide()
}

function notifyMobile(from, align, icon, type, animIn, animOut, bg, index_response, info_response) {
    let iconClass = '';
    if (icon == 'success') {
        iconClass = 'fa fa-check'
    }
    else if (icon == 'danger') {
        iconClass = 'fa fa-times'
    }
    else if (icon == 'warning') {
        iconClass = 'fa fa-exclamation'
    }

    $.notify({
        icon: icon,

        url: ''
    },
        {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 15,
                y: 50
            },
            spacing: 10,
            z_index: 10031,
            delay: 500,
            timer: 700,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:

                '<div class="text-center text-white" style="width:200px;padding:10px;border-radius:5px;background:var(--success);"><span>success<span></div>'
        });
}

function notifyMobileDanger(from, align, icon, type, animIn, animOut, bg, index_response, info_response) {
    let iconClass = '';
    if (icon == 'success') {
        iconClass = 'fa fa-check'
    }
    else if (icon == 'danger') {
        iconClass = 'fa fa-times'
    }
    else if (icon == 'warning') {
        iconClass = 'fa fa-exclamation'
    }

    $.notify({
        icon: icon,

        url: ''
    },
        {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 15,
                y: 50
            },
            spacing: 10,
            z_index: 10031,
            delay: 500,
            timer: 700,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:

                '<div class="text-center text-white" style="width:200px;padding:10px;border-radius:5px;background:var(--danger);"><span>gagal<span></div>'
        });
}

function notifyMobileDangerCustom(from, align, icon, type, animIn, animOut, bg, index_response, info_response) {
    let iconClass = '';
    if (icon == 'success') {
        iconClass = 'fa fa-check'
    }
    else if (icon == 'danger') {
        iconClass = 'fa fa-times'
    }
    else if (icon == 'warning') {
        iconClass = 'fa fa-exclamation'
    }

    $.notify({
        icon: icon,

        url: ''
    },
        {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 15,
                y: 50
            },
            spacing: 10,
            z_index: 10031,
            delay: 500,
            timer: 1000,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:

                '<div class="text-center text-white" style="width:200px;padding:10px;border-radius:5px;background:var(--danger);"><span>' + index_response + '<span><br><span>' + info_response + '<span></div>'
        });
}


function notifyMobileCustom(from, align, icon, type, animIn, animOut, bg, index_response, info_response) {
    let iconClass = '';
    if (icon == 'success') {
        iconClass = 'fa fa-check'
    }
    else if (icon == 'danger') {
        iconClass = 'fa fa-times'
    }
    else if (icon == 'warning') {
        iconClass = 'fa fa-exclamation'
    }

    $.notify({
        icon: icon,

        url: ''
    },
        {
            element: 'body',
            type: type,
            allow_dismiss: true,
            placement: {
                from: from,
                align: align
            },
            offset: {
                x: 15,
                y: 50
            },
            spacing: 10,
            z_index: 10031,
            delay: 500,
            timer: 700,
            url_target: '_blank',
            mouse_over: false,
            animate: {
                enter: animIn,
                exit: animOut
            },
            template:

                '<div class="text-center text-white" style="width:200px;padding:10px;border-radius:5px;background:var(--success);"><span >' + index_response + '<span></div>'
        });
}