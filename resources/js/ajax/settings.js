function formSubmit() {
    $(document).on('submit', '#home-page-form', (e) => {
        e.preventDefault();
        e.stopPropagation();
        spinner.start();
        axios.put('/settings', {
                settings: {
                organisation: $('#organisation').val(),
                email: $('#email').val(),
                phone: $('#phone').val()
            }
        }).then((response) => {

        })
          .catch((error) => {
            // handle error

        })
          .then(() => {
            spinner.stop();
        });
    });
}

module.exports = {
    formSubmit: formSubmit
}
