//laboratorio 1
$(document).ready(function() {
    $('#obtenerLab').change(function() {
        var selectElement = document.getElementById('obtenerLab');
        var code1 = selectElement.options[selectElement.selectedIndex].value;
        var description1 = selectElement.options[selectElement.selectedIndex].text;

        $('#description1').val(description1);
        $('#code1').val(code1);
    });
});


$(document).ready(function() {
    $('#obtenerLab2').change(function() {
        var selectElement = document.getElementById('obtenerLab2');
        var code2 = selectElement.options[selectElement.selectedIndex].value;
        var description2 = selectElement.options[selectElement.selectedIndex].text;

        $('#description2').val(description2);
        $('#code2').val(code2);
    });
});

$(document).ready(function() {
    $('#obtenerLab3').change(function() {
        var selectElement = document.getElementById('obtenerLab3');
        var code3 = selectElement.options[selectElement.selectedIndex].value;
        var description3 = selectElement.options[selectElement.selectedIndex].text;

        $('#description3').val(description3);
        $('#code3').val(code3);
    });
});

$(document).ready(function() {
    $('#obtenerLab4').change(function() {
        var selectElement = document.getElementById('obtenerLab4');
        var code4 = selectElement.options[selectElement.selectedIndex].value;
        var description4 = selectElement.options[selectElement.selectedIndex].text;

        $('#description4').val(description4);
        $('#code4').val(code4);
    });
});

$(document).ready(function() {
    $('#obtenerLab5').change(function() {
        var selectElement = document.getElementById('obtenerLab5');
        var code5 = selectElement.options[selectElement.selectedIndex].value;
        var description5 = selectElement.options[selectElement.selectedIndex].text;

        $('#description5').val(description5);
        $('#code5').val(code5);
    });
});

$(document).ready(function() {
    $('#obtenerLab6').change(function() {
        var selectElement = document.getElementById('obtenerLab6');
        var code6 = selectElement.options[selectElement.selectedIndex].value;
        var description6 = selectElement.options[selectElement.selectedIndex].text;

        $('#description6').val(description6);
        $('#code6').val(code6);
    });
});
