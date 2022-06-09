window.addEventListener("load",()=>{

    let fechaCalendario = new Array;
    let calendario = new Array;
    let meses = ["Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre"];
    let fecha = new Date();
    let dia = fecha.getDate();
    let mes = fecha.getMonth();
    let año = fecha.getFullYear();

    const flechaAntes = document.getElementById("flechaAntes");
    const flechaDespues = document.getElementById("flechaDespues");
    const datos = document.getElementById("datos");
    const dias = document.getElementById("dias");
    const fechasPredeterminadas = document.getElementById("fechasPredeterminadas");

    function despliegaDatos(){
        fecha.setFullYear(año,mes,dia);
        datos.innerHTML = meses[mes] + " " + año;
        let diasTotales = new Date(año, mes, 0).getDate();
        dias.innerHTML = "";
        fechasPredeterminadas.innerHTML = "";
        let empiezaMes = new Date(año,mes,1).getDay();
        for(let i=empiezaMes;i>0;i--){
            dias.innerHTML += "<div class='calendario' id='dia'></div>";
        }
        for(let i=1; i<(diasTotales+1); i++){
            let dias = document.getElementById("dias");
            if(fechasIguales(mes+1,i)==true){
                let divFechaCalendario = document.createElement("div");
                divFechaCalendario.innerHTML = "<div class='calendario' id='dia'><span id='fechaCalendario'>"+i+"</span></div>";
                // divFechaCalendario.addEventListener("click",datosFecha);
                dias.appendChild(divFechaCalendario)
            } else {
                dias.innerHTML += "<div class='calendario' id='dia'>"+i+"</div>";
            }
        }
    }

    fetch("../dynamics/php/calendario.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                fechaCalendario = new Array;
                calendario = new Array;
                for(resultado of datosJSON.resultados){
                    fechaCalendario = {"ID_Fecha":parseInt(resultado.ID_Fecha),"Asunto":resultado.Asunto,"mesCalendario":parseInt(resultado.Fecha.substr(5,2)),"diaCalendario":parseInt(resultado.Fecha.substr(8,2)),"TipoFecha":resultado.TipoFecha};
                    calendario.push(fechaCalendario);
                }
            } else {
                alert(datosJSON.texto);
            }
        });

    function fechasIguales(mes,dia){
        let igual=false;
        for(date of calendario){
            if(mes==date.mesCalendario&&dia==date.diaCalendario){
                igual=true;
                let fechasPredeterminadas = document.getElementById("fechasPredeterminadas");
                fechasPredeterminadas.innerHTML += "<br><br>Asunto: "+date.Asunto+"<br>Fecha: "+date.diaCalendario+" de "+meses[mes-1]+"<br>Tipo: "+date.TipoFecha;
            }
        }
        return igual;
    }

    despliegaDatos();

    flechaAntes.addEventListener("click",()=>{
        if(mes != 0){
            mes--;
        } else {
            mes = 11;
            año--;
        }
        despliegaDatos();
    });

    flechaDespues.addEventListener("click",()=>{
        if(mes != 11){
            mes++;
        } else {
            mes = 0;
            año++;
        }
        despliegaDatos();
    });
    
});