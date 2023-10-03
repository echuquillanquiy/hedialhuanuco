// Función para calcular la diferencia y mostrarla en el input de resultado
function calcularDiferencia() {
    // Obtiene la fecha actual
    var fechaActual = new Date();

    // Obtiene la fecha ingresada por el usuario desde el input
    var fechaIngresada = document.getElementById('fechaInicioDialisis').value;
    var partesFecha = fechaIngresada.split('-');
    var dia = parseInt(partesFecha[2], 10);
    var mes = parseInt(partesFecha[1], 10) - 1; // Resta 1 al mes ya que en JavaScript los meses van de 0 a 11
    var anio = parseInt(partesFecha[0], 10);

    // Crea objetos Date para ambas fechas
    var fechaUsuario = new Date(anio, mes, dia);

    // Calcula la diferencia en milisegundos
    var diferenciaMilisegundos = fechaActual - fechaUsuario;

    // Convierte la diferencia de milisegundos a días
    var diferenciaDias = Math.floor(diferenciaMilisegundos / (1000 * 60 * 60 * 24));

    // Calcula la diferencia en meses y años
    var diferenciaAnios = fechaActual.getFullYear() - fechaUsuario.getFullYear();
    var diferenciaMeses = fechaActual.getMonth() - fechaUsuario.getMonth();
    if (diferenciaMeses < 0) {
        diferenciaAnios--;
        diferenciaMeses += 12;
    }

    // Muestra los resultados en el input de resultado
    var resultadoInput = document.getElementById('resultadoInput');
    resultadoInput.value = 'Días de diferencia: ' + diferenciaDias +
        '\nAños de diferencia: ' + diferenciaAnios +
        '\nMeses de diferencia: ' + diferenciaMeses;
}
