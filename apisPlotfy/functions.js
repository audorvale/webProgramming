function openDataGov () {
    var dataDate = [];
    var caldas = [];
    var bogota = [];
    var antioquia = [];
    fetch('https://www.datos.gov.co/resource/8835-5baf.json')
        .then(responseSuccess => responseSuccess.json())
        .then(function(data) {
            console.log(data)
            for (let index = 0; index <= data.length; index++ ) {
                console.log(data[index])
            }
            data.forEach(element => {
                if (element.fecha != undefined && element.caldas != undefined && element.bogota != undefined && element.antioquia != undefined && element.acumuladas != undefined) {
                    dataDate.push(element.fecha);
                    caldas.push(element.caldas);
                    bogota.push(element.bogota);
                    antioquia.push(element.antioquia);
                }
            });
        
            var chart1 = {
                y: caldas,
                x: dataDate,
                name: 'Caldas',
                type: 'bar'
            }
            var chart2 = {
                y: antioquia,
                x: dataDate,
                name: 'Antioquia',
                type: 'bar'
            }
            var chart3 = {
                y: bogota,
                x: dataDate,
                name: 'Bogota',
                type: 'bar'
            }

            let dataChats = [chart1,chart2,chart3];

            let layout = {
                barmode: 'stack',
                title : {
                    text: 'Pruebas PCR en Colombia'
                },
            };

            Plotly.newPlot('divChar1', dataChats, layout)
        });    
}

openDataGov () 