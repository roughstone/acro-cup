function switchForm() {
    $(document).on('click', '.nominative-button', (e) => {
        if ($(e.target).hasClass('btn-outline-secondary')) {
            $('.nominative-button.btn-outline-success')
            .removeClass('btn-outline-success')
            .addClass('btn-outline-secondary');
            $(e.target)
            .removeClass('btn-outline-secondary')
            .addClass('btn-outline-success');
        }
        getForm($(e.target).data('target'));
    });
}

function setGroups() {
    $(document).on('change', '.category', (e) => {
        if ($(e.target).val() == 'Women\'s Group') {
            $('.competitor').last().addClass('disabled').find('input').val('').attr('disabled', 'disabled');
        } else {
            if ($('.competitor').last().hasClass('disabled')) {
                $('.competitor').last().removeClass('disabled').find('input').removeAttr('disabled');
            }
        }
    });
}

function getForm(form) {
    spinner.start();
    axios.get(`/getForm/${form}Form`).then((response) => {
        $('#nominative-form').empty().html(response.data);
        $('.form-records').empty();
        let records = "travelSchedule"
        if (form != "travelSchedule") {
            records = form.slice(0, -1);
        }
        axios.get(`/records/${records}`).then((response) => {
            $('.form-records').html(response.data);
        })
        .catch((error) => {
            // handle error

        })
        .then(() => {
            spinner.stop();
        });
    })
    .catch((error) => {
        // handle error

    })
      .then(() => {

    });
}

function formSubmit() {
    $(document).on('submit', '#nominative-form', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let competitors = $('.competitor').not('.disabled');
        let competitorsArray = [];
        let team = false;
        if ($('.category').length > 0 && $('.age_group').length > 0) {
            team = {
                category: $('.category').val(),
                age_group: $('.age_group').val()
            }
            if (competitors.length > 2) {
                team.kind = 'group';
            } else if (competitors.length == 2) {
                team.kind = 'pair';
            }
        }
        let travelSchedule = {};
        if ($('#travel-schedule').length > 0) {
            team = "travelSchedule";
            travelSchedule.arrival = $('input.arrival').val();
            travelSchedule.departure = $('input.departure').val();
        }
        competitors.each((key, value) => {
            let object = {};
            object.first_name = $(value).find('.first_name').val();
            object.family_name = $(value).find('.family_name').val();
            object.birthday = $(value).find('.birthday').val();
            if ($(value).find('.gender').length > 0) {
                object.gender = $(value).find('.gender').val();
            }
            object.fig_license = $(value).find('.fig_license').val();
            if (!team) {
                object.function = $(value).find('.function').val();
            }
            competitorsArray.push(object);
        })
        let data = {};
        data.team = team;
        if (competitorsArray.length > 0 ) {
            data.competitors = competitorsArray;
        }
        if (team == "travelSchedule") {
            data.travelSchedule = travelSchedule;
        }
        axios.post('/nominative', data).then((response) => {
            if (team == "travelSchedule") {
                $('.form-records').html(response.data);
            } else {
                $('.form-records').append(response.data);
            }
        })
          .catch((error) => {
            // handle error

        })
          .then(() => {
            spinner.stop();
        });
    })
}

function deletionConfirmation() {
    $(document).on('click', 'span.delete', (e) => {
        let clone = $(e.target).parents('.team-card').clone();
        $('#deleteModal .modal-body-content').html(clone);
        $('#deleteModal').attr('data-id', $(e.target).data('id'));
        $('#deleteModal .modal-body-content').find('span.delete').remove();
    })
}

function deleteTeam () {
    $(document).on('click', '#deleteModal .btn-primary', () => {
        let type = 'team';
        if ($('button.btn-outline-success').html().indexOf('OFFICIALS') != -1) {
            type = 'officials';
        }
        spinner.start();
        axios.delete(`/nominative/${type}/${$('#deleteModal').attr('data-id')}`)
        .then((response) => {
            $(`span.delete[data-id="${$('#deleteModal').attr('data-id')}"]`)
            .parents('.team-card').remove();
        })
          .catch((error) => {
            // handle error

        })
          .then(() => {
            spinner.stop();
            $('#deleteModal').modal('hide');
        });
    })
}
module.exports = {
    formSubmit: formSubmit,
    switchForm: switchForm,
    setGroups: setGroups,
    deletionConfirmation: deletionConfirmation,
    deleteTeam: deleteTeam
}
