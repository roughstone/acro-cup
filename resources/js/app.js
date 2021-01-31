require('./bootstrap');

window.axios = require('axios');

window.axios.defaults.headers.common = {
    'X-Requested-With': 'XMLHttpRequest',
    "Accept": "application/json",
    'X-CSRF-TOKEN' : $('#csrf-token').attr('content')
};

window.spinner = {
    start: () => {
        $('#spinner-container').removeClass('d-none');
    },
    stop: () => {
        $('#spinner-container').addClass('d-none');
    }
}

const processInclude = require('./util');
$(document).ready(() => {
    processInclude(require('./funcs/home'));
    processInclude(require('./ajax/nav'));
    processInclude(require('./ajax/nominative'));
    processInclude(require('./ajax/definative'));
    processInclude(require('./ajax/profile'));
    processInclude(require('./ajax/accomudation'));
    processInclude(require('./ajax/competition'));
    processInclude(require('./ajax/hotels'));
    processInclude(require('./ajax/settings'));
    processInclude(require('./components/competition'));
});
