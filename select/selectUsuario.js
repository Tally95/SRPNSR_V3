$(document).ready(function () {

    $("#cboParque").change(function () {
        alert('chage');

        $("#cboParque option:selected").each(function () {

            var id_Parque = $(this).val();
            alert('select  ' + id_Parque);
            $.post("ObtenerSectores.php", {id_Parque: id_Parque}, function(data) {
                $("#cboSector").html(data);
                alert('Hola');
            });
        });
    });
});



