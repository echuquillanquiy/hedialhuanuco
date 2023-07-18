function Anos() { ///calcular años
    var FechaNacimiento = document.getElementById('date_of_birth').value;
    var fechaNace = new Date(FechaNacimiento);
    var fechaActual = new Date();
    var mes = fechaActual.getMonth();
    var dia = fechaActual.getDate();
    var año = fechaActual.getFullYear();
    fechaActual.setDate(dia);
    fechaActual.setMonth(mes);
    fechaActual.setFullYear(año);
    edad = Math.floor(((fechaActual - fechaNace) / (1000 * 60 * 60 * 24) / 365));
    document.getElementById('age').value = edad;
}

