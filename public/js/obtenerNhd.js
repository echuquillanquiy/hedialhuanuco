$(document).ready(function () {
    $('#obtenerNhd').change(function () {
        var hospOrigin = $(this).find('option:selected').data('hosp');

        // Sumarle 1 si es numérico
        var newValue = (hospOrigin !== undefined && !isNaN(hospOrigin)) 
            ? parseInt(hospOrigin) + 1 
            : '';

        $('#hosp_origin').val(newValue);
    });
});