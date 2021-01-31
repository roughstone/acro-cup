function formSubmit() {
    $(document).on('submit', '#hotel-form', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let data = {
            records: {
                stars: $('#stars-value').children().length
            }
        };
        $(e.target).find('input').each((key, input) => {
            if (input.type == "checkbox") {
                data.records[input.id] = input.checked
            } else {
                data.records[input.id] = $(input).val();
            }
        })
        axios.post(`/hotels`, data)
        .then((response) => {
            $('#hotels-listing').prepend(response.data);
        })
        .catch((error) => {
            // handle error
            console.log(error)
        })
        .then(() => {
            spinner.stop();
        });
    });
}

function starSelect() {
    $(document).on('click', '.hotels-dropdown .dropdown-item', (e) => {
        let target = $(e.target)
        if (target.hasClass('fa-star')) {
            target = target.parent();
        }
        $('#stars-value').html(target.html());
    });
}

function enableRoom() {
    $(document).on('click', '#hotel-form input:checkbox', (e) => {
        let inputs = $(e.target).parents('.room-group').find('input[type="number"]');
        inputs.each((key, val) => {
            val.disabled = !e.target.checked;
            if (!e.target.checked) {
                $(val).val('');
            }
        });
    });
}

function editHotel() {
    $(document).off('click', '.edit-hotel').on('click', '.edit-hotel', (e) => {
        e.preventDefault();
        e.stopPropagation($(e.target).attr('href'));
        axios.get($(e.target).attr('href'))
        .then((response) => {
            $('#hotel-form').replaceWith(response.data);
            document.body.scrollTop = document.documentElement.scrollTop = 0;
        })
        .catch((error) => {
            // handle error
            console.log(error.response)
        })
        .then(() => {
            spinner.stop();
        });
    });
}

module.exports = {
    formSubmit: formSubmit,
    starSelect: starSelect,
    enableRoom: enableRoom,
    editHotel: editHotel
}
