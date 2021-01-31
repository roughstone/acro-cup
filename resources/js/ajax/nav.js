function getIndex() {
    $(document).on('click', '.get-page', (e) => {
        e.preventDefault();
        if ($(e.target)[0].id.length > 0) {
            spinner.start();
            axios.get(`/${e.target.id}`).then((response) => {
                $('.get-page').removeClass('active');
                $(e.target).addClass('active');
                $('.container-fluid.content').empty().html(response.data);
                if ($('.navbar-toggler').css('display') != 'none') {
                    $('.navbar-toggler').click();
                }
                if ($('button[data-target="pairs"]').length > 0) {
                    $('button[data-target="pairs"]').click();
                }
                if($(e.target)[0].id == 'definative') {
                    $(document).trigger('definativeLoad')
                }
                window.history.pushState( {} , '', `/app/${e.target.id}` );
            })
            .catch((error) => {
                // handle error

            })
            .then(() => {
                spinner.stop();
            });
        }
    })
}
function browserNavigation () {
    window.onpopstate = () => {
        $(`#${window.location.pathname.replace('/app/', '')}`).trigger('click');
    }
}

module.exports = {
    getIndex: getIndex,
    browserNavigation: browserNavigation
}
