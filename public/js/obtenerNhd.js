$(document).ready(function () {
    $('#obtenerNhd').change(function () {
        var hospOrigin = $(this).find('option:selected').data('hosp'); // accede a data-hosp
        $('#hosp_origin').val(hospOrigin || ''); // si es undefined, pone vacío
    });
});