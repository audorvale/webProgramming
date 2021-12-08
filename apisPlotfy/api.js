function consumirAPI () {
    var fecha = [];
    var caldas = [];
    var antioquia = [];
    var bogota = [];

    // call data of api
    fetch('https://www.datos.gov.co/resource/8835-5baf.json')
    .then(respuesta_exitosa => respuesta_exitosa.json())
    .then(function(datos_obtenidos){
        datos_obtenidos.forEach(elemento => {
            console.log(elemento)
            if (elemento.fecha != undefined && elemento.caldas != undefined && elemento.antioquia != undefined && elemento.bogota != undefined) {
                caldas.push(elemento.caldas);
                antioquia.push(elemento.antioquia);
                bogota.push(elemento.bogota);
                fecha.push(elemento.fecha);
            }
        });

        // variables by charts 
        var graf1 = {
            y: caldas,
            x:fecha,
            name: 'Caldas',
            type: 'bar'
        };

        var graf2 = {
            y: antioquia,
            x:fecha,
            name: 'Antioquia',
            type: 'bar'
        };

        var graf3 = {
            y: bogota,
            x:fecha,
            name: 'Bogota',
            type: 'bar'
        };

        var datosGraficas = [graf1,graf2,graf3];

        var layout = {
            barmode: 'stack',
            title: {
                text: 'Pruebas PCR relizadas en Colombia'
            }
        };

        Plotly.newPlot('grafico', datosGraficas, layout);
    });
}

consumirAPI ();