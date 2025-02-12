$(document).ready(function() {
    $('#obtenerNhd').change(function() {
        var selectElement = document.getElementById('obtenerNhd');
        var hosp_origin = parseInt(selectElement.options[selectElement.selectedIndex].text) + 1 ;

        $('#hosp_origin').val(hosp_origin);
    });
});
