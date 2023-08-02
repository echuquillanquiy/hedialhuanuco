$(document).ready(function() {
    $('#obtenerfua').change(function() {
        var selectElement = document.getElementById('obtenerfua');
        var order_id = selectElement.options[selectElement.selectedIndex].value;

        $('#order_id').val(order_id);
    });
});
