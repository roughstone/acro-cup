function openEditModal () {
    $(document).on('click', '.add-competition' , () => {
        $('#title').val('');
        $('#year').val('2020');
        $('#image-title').html('default.jpg')
        $('#competitionModal').removeAttr('data-id');
        $('#competitionModal').modal().show();
        if ($('#competitionForm').hasClass('put')) {
            $('#competitionForm').removeClass('put').addClass('post');
        }
    });
}

function setImage () {
    $(document).on('click', '.inputImage', (e) => {
        $('#image').trigger('click');
    });
}

function changeImage () {
    $(document).on('change', '#image', (e) => {
        e.target.value.slice(e.target.value.lastIndexOf('\\') + 1)
        let reader = new FileReader();
        let file = e.target.files[0];
        reader.onloadend = () => {
            $('.inputImage').attr('src', reader.result);
            $('#image-title').html(e.target.value.slice(e.target.value.lastIndexOf('\\') + 1))
        }
        reader.readAsDataURL(file)
    });
}

function getDirective () {
    $(document).on('click', '#directive', (e) => {
        if ($(e.target).hasClass('directive-file')) {
            return;
        }
        $('#directive_file').trigger('click');
    });
    $(document).on('change', '#directive_file', (e) => {
        let reader = new FileReader();
        let file = e.target.files[0];
        reader.onloadend = () => {
            $('#directive_icon').attr('data-value', reader.result);
            $('#directive').html('Competition Directive: ' + e.target.value.slice(e.target.value.lastIndexOf('\\') + 1))
            $('#directive').attr('data-value', e.target.value.slice(e.target.value.lastIndexOf('\\') + 1))
            $('#directive_icon').html('<i class="fas fa-check text-success display-4"></i>')
        }
        reader.readAsDataURL(file)
    });
}


module.exports = {
    openEditModal: openEditModal,
    setImage: setImage,
    changeImage: changeImage,
    getDirective: getDirective
}
