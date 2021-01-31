function formSubmit() {
    $(document).on('submit', '#accommodationForm', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let data = {
            records: {
                hotel: $('#hotel').val(),
                check_in:  $('#check_in').val(),
                check_out: $('#check_out').val(),
                room: $('#room').val(),
                number: $('#number').val(),
            }
        };
        axios.post(`/accommodation`, data)
        .then((response) => {
            $('.form-records').append(response.data)
            hotelAjax($('#hotel'));
        })
          .catch((error) => {
            // handle error
            $('.form-records').append(error.response.data)
        })
          .then(() => {
            spinner.stop();
        });
    });
}
function hotelAjax (element) {
    axios.get(`/accommodation/${element.val()}`)
        .then((response) => {
            $('#roomType').html(response.data);
            $('.number-block').addClass('d-none');
        })
        .catch((error) => {
            // handle error

        })
        .then(() => {
            spinner.stop();
        });
}

function hotelSelect() {
    $(document).on('change', '#hotel', (e) => {
        hotelAjax($(e.target));
    });
}

function maxRooms() {
    $(document).on('change', '#room', (e) => {
        $('.number-block').removeClass('d-none');
        $('#number').attr('max', $(`#${$(e.target).val()}`).data('avivable'));
    });
}

function deleteAccommodation() {
    $(document).on('click', '.accommudation-delete', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let element = $(e.target);
        if (element.hasClass('fa-trash-alt')) {
            element = element.parent();
        }
        axios.delete(element.attr('href'))
        .then((response) => {
            element.parents('.accommudation-card').remove();
            hotelAjax($('#hotel'));
        })
        .catch((error) => {
            // handle error

        })
        .then(() => {
            spinner.stop();
        });
    });
}

function customiseInputError() {
    $(document).on('change', '#number', (e) => {
        e.target.oninvalid = (event) => {
            console.log(event);
            e.target.setCustomValidity("");
            if (!event.target.validity.valid) {
                event.target.setCustomValidity(`There are only ${$('#number').attr('max')} rooms avivable for that room type.`);
            }
        }
    });
}

module.exports = {
    formSubmit: formSubmit,
    hotelSelect: hotelSelect,
    maxRooms: maxRooms,
    customiseInputError: customiseInputError,
    deleteAccommodation: deleteAccommodation
}
