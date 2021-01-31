function formSubmit() {
    $(document).on('submit', '#competitionForm', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let data = {
            title: $('#title').val(),
            year:  $('#year').val(),
            poster: $('#image-title').html(),
            file: $('.inputImage').attr('src'),
            directive: $('#directive').data('value'),
            directive_file: $('#directive_icon').data('value')
        };
        console.log(data)
        spinner.start();
        axios[e.target.className](`/competitions${e.target.className == "put" ? `/${$('#competitionModal').data('id')}` : ''}`, data)
        .then((response) => {
            //    !!! find out whats wrong
            if (e.target.className == "post") {
                $(response.data).insertAfter('.competitions-headers');
            } else {
                console.log($(`.${$('#competitionModal').data('id')}`));
                $(`.${$('#competitionModal').data('id')}`).replaceWith(response.data);
            }
            $('#competitionModal').modal('hide');
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

function switchActive () {
    $(document).on('change', '.toggle-active', (e) => {
        axios.put(`/competitions/${$(e.target).data('id')}`, {active: true})
        .then((response) => {
            $(e.target).parents('.competition-card').replaceWith(response.data);
            console.log([$(e.target), response])
        })
          .catch((error) => {
            $(e.target).find('option')[0].disabled = false;
            $(e.target).find('option')[0].selected = true;
            $(e.target).find('option')[0].disabled = true;
            $(e.target).parents('.competition-card').append(error.response.data.msg);
            $('.error-msg').fadeOut(3000);
        })
          .then(() => {
            spinner.stop();
        })

    });
}

function populateEditModal() {
    $(document).on('click', '.edit-competition' , (e) => {
        spinner.start();
        axios.get(`/competition/${$(e.target).data('id')}`)
        .then((response) => {
            let data = response.data.competition;
            $('#title').val(data.title);
            $('#year').val(data.year);
            $('#competitionModal').attr('data-id', data.id)
            $('#image-title').html(data.poster.slice(data.poster.lastIndexOf('/') + 1));
            if (data.file) {
                $('.inputImage').attr('src', data.file)
            }
            $('#competitionModal').modal().show();
            if ($('#competitionForm').hasClass('post')) {
                $('#competitionForm').removeClass('post').addClass('put');
            }
            if (data.directive && data.directive_file) {
                $('#competition-direcitive').html(`<a class='directive-file' href="${data.directive_file}" download="${data.directive}">${data.directive}</a>`);
                $('#directive_icon').html('<i class="fas fa-check text-success display-4"></i>')
            }
        }).catch((error) => {

        })
        .then(() => {
            spinner.stop();
        });
    });
}

function getDirective () {
    $(document).on('click', '.directive-download', function(e) {
        spinner.start();
        e.preventDefault();
        e.stopPropagation();
        var url = e.target.href
        axios.get(url)
        .then((response) => {
            $('.file-downloader').remove();
            $('body').append('<a class="file-downloader d-none">downloader</a>')
            $('.file-downloader').attr('href', response.data.file);
            $('.file-downloader').attr('download', response.data.name);
            $('.file-downloader')[0].click();
        })
        .catch((error) => {
        })
        .then(() => {
            spinner.stop();
        })
    });
}

module.exports = {
    formSubmit: formSubmit,
    switchActive: switchActive,
    getDirective: getDirective,
    populateEditModal: populateEditModal
}
