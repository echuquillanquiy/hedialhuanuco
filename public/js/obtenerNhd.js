$(document).ready(function() {
    $('#obtenerNhd').change(function() {
        var selectElement = document.getElementById('obtenerNhd');
        var nhd = parseInt(selectElement.options[selectElement.selectedIndex].text) + 1 ;

        $('#nhd').val(nhd);
    });
});
