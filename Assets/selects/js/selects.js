$(document).ready(function () {

    $.ajax({
        type: 'POST',
        url: 'Assets/selects/php/cargar_parques.php'
    })
            .done(function (lista_parq) {
                $('#cboParque').html(lista_parq)
            })

    $('#cboParque').on('change', function () {
        var id = $('#cboParque').val()
        $.ajax({
            type: 'POST',
            url: 'Assets/selects/php/cargar_sectores.php',
            data: {'id': id}
        })
                .done(function (lista_parq) {
                    $('#cboSector').html(lista_parq)
                })

    })

})


