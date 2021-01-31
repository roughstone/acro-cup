function formSubmit() {
    $(document).on('submit', '#profile-form', (e) => {
        e.preventDefault();
        e.stopPropagation();
        spinner.start();
        axios.post('/profile', {
            contact_person: $('input[name="contact_person"]').val(),
            phone: $('input[name="phone"]').val(),
            nation: $('input[name="nation"]').val()
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
