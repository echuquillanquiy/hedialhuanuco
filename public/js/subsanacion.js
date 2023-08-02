$(document).ready(function() {
    $('#obtenerfua').change(function() {
        var selectElement = document.getElementById('obtenerfua');
        var order_id = selectElement.options[selectElement.selectedIndex].value;

        $('#order_id').val(order_id);
    });
});


$(document).ready(function() {
    $('#obtenerfuafecha').change(function() {
        var selectElement = document.getElementById('obtenerfuafecha');
        var date_order = selectElement.options[selectElement.selectedIndex].value;

        $('#date_order').val(date_order);
    });
});
