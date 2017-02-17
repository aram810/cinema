$(document).ready(function () {
    $('.free-place').on('click', function () {
        let row = $(this).closest('td').data('row'),
            column = $(this).closest('td').data('column'),
            reserveUrl = $('#reserve_url').val(),
            seanceId = +$('#seance_id').val();

        $.ajax({
            url: reserveUrl,
            dataType: 'JSON',
            type: 'POST',
            data: {
                Reserve: {
                    seance_id: seanceId,
                    row: row,
                    column: column
                },
            },
        }).done((res) => {
            if (res.success) {
                console.log($(this).parent().empty().html('R'));
                $(this).html('R');
            }
        });
    })
});