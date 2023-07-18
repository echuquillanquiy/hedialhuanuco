function calcularIMC() {
    // Obtener los valores del peso y talla
    var peso = parseFloat(document.getElementById('peso').value);
    var talla = parseFloat(document.getElementById('talla').value);

    // Verificar si los valores son válidos
    if (isNaN(peso) || isNaN(talla) || peso <= 0 || talla <= 0) {
        document.getElementById('imc').textContent = '---';
        return;
    }

    // Calcular el IMC
    var imc = peso / (talla * talla);

    // Mostrar el resultado
    document.getElementById('imc').value = imc.toFixed(2);
}
