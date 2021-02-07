function countTotal(card) {
    let inputs = card.find('input');
    let total = card.find('.total');
    let totalVal = 0;
    inputs.each((key, val) => {
        totalVal += parseInt($(val).val());
    })
    total.html(totalVal);
}

function formSubmit() {
    $(document).on('submit', '#provisional-form', (e) => {
        e.preventDefault();
        e.stopPropagation();
        let records = {};
        $(e.target).find('input').each((key, val) => {
            records[$(val).attr('name')] = $(val).val();
        })
        axios.post('/provisional', {
            records: records,
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

function updateTotals() {
    $(document).on('change', '#provisional-form input', (e) => {
        countTotal($(e.target).parents('.card'));
    });
}

function loadTotals() {
    $(document).on('provisionalLoad', () => {
        $('.card').each((key, val) => {
            countTotal($(val))
        });
    })
}

module.exports = {
    formSubmit: formSubmit,
    updateTotals: updateTotals,
    loadTotals: loadTotals
}
