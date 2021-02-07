function load() {
    $(document).ready((e) => {
        if(window.location.pathname == '/app') {
            if ($('#profile').length > 0) {
                $('#profile').trigger('click');
            }
            if ($('#competitions').length > 0) {
                $('#competitions').trigger('click');
                console.log($('#competitions'))
            }
        } else {
            $(`#${window.location.pathname.replace('/app/', '')}`).trigger('click');
        }
    });
}

function switchAuth() {
    $(document).on('click', '.auth-switch', () => {
        $('.auth-form').toggleClass('d-none');
    });
}

function logout() {
    $(document).on('click', '.logout-link', (e) => {
        e.preventDefault();
        e.stopPropagation();
        $('#logout-form').trigger('submit');
    });
}

function registrationFormErrorHandle () {
    $(window).on("load", function() {
        if ($('#registrationModal .invalid-feedback').length) {
            $('#registrationModal').modal('show');
            if ($("label[for='email'] strong").html() === "These credentials do not match our records.") {
                $('.auth-form').toggleClass('d-none');
            }
        }
    });
}

module.exports = {
    load: load,
    switchAuth: switchAuth,
    logout: logout,
    registrationFormErrorHandle: registrationFormErrorHandle
}
