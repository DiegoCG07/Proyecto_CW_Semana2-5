window.addEventListener("load",()=>{
    // Contenedores y 2 botones
    const btnPredeterminadas = document.getElementById("btnPredeterminadas");
    const predeterminadas = document.getElementById("predeterminadas");
    const btnDudas = document.getElementById("btnDudas");
    const dudas = document.getElementById("dudas");

    //
    const preguntaForo = document.getElementById("preguntaForo");
    const agregar = document.getElementById("agregar");
    const dudasForo = document.getElementById("dudasForo");
    // const cancelar = document.getElementById("cancelar");

    fetch("../dynamics/php/Predeterminadas.php")
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                let predeterminadas = document.getElementById("predeterminadas");
                predeterminadas.innerHTML = "";
                for(resultado of datosJSON.resultados){
                    predeterminadas.innerHTML += "<div class='optPredeterminada' id='"+resultado.id+"'><span id='pregunta'>"+resultado.pregunta+"</span><br><br><span id='respuesta'>"+resultado.respuesta+"</span></div>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });

    function despliegaDudas(){
        fetch("../dynamics/php/Dudas.php")
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    let dudasForo = document.getElementById("dudasForo");
                    dudasForo.innerHTML = "";
                    for(resultado of datosJSON.resultados){
                        let divPreguntaForo = document.createElement("div");
                        divPreguntaForo.innerHTML = "<div class='optPredeterminada' id='"+resultado.id+"'><span id='pregunta'>"+resultado.pregunta+"</span><br><span id='datos'>Alumno: "+resultado.Num_Cuenta+"<br>Fecha: "+resultado.Fecha+"</span><br><button class='boton' id='Responder'>Responder</button></div>";
                        divPreguntaForo.dataset.tarea = resultado.id;
                        divPreguntaForo.addEventListener("click", btnPresionado);

                        
                        // let divRespuestasForo = document.createElement("div");
                        // divRespuestasForo.innerHTML = "aqui van las respuestas";
                        // divPreguntaForo.innerHTML += divRespuestasForo;

                        dudasForo.appendChild(divPreguntaForo);
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
    }
    despliegaDudas();

    function subirPregunta(){
        let date = new Date();
        date = date.getFullYear()+"-"+date.getMonth()+"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
        let datosForm = new FormData();
        datosForm.append("pregunta",preguntaForo.value);
        datosForm.append("fecha",date);
        fetch("../dynamics/php/SubirPregunta.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    alert(datosJSON.texto);
                    despliegaDudas();
                } else if(datosJSON.ok == false){
                    alert(datosJSON.texto);
                }
            });

    }

    btnDudas.addEventListener("click",()=>{
        dudas.style.display = "block";
        predeterminadas.style.display = "none";
    });

    btnPredeterminadas.addEventListener("click",()=>{
        dudas.style.display = "none";
        predeterminadas.style.display = "block";
    });

    // If tipo usuario == 1
    agregar.addEventListener("click",(evento)=>{
        evento.stopPropagation();
        evento.preventDefault();
        if(preguntaForo.value != ""){
            subirPregunta();
            preguntaForo.value = "";
        } else {
            alert("No se ingreso ninguna pregunta");
        }
    });

    // dudasForo.addEventListener("click",(evento)=>{
    //     if(evento.target.id == "Responder"){
    //         console.log("btnResponder");
    //     }
    // });
    function btnPresionado(evento){
        if(evento.target.id == "Responder"){
            // console.log(evento.currentTarget);
            let divClickeado = evento.currentTarget;
            divClickeado.innerHTML += "<form><input type='text' name='preguntaForo' id='respuestaForo' placeholder='Escribe tu respuesta'><br><button type='submit' id='subirRespuesta'>+</button><button type='reset' id='cancelar'>Cancelar</button></form>";
            
            divClickeado.addEventListener("click", btnResponder);
        }
    }
    function btnResponder(evento){
        evento.stopPropagation();
        evento.preventDefault();
        if(evento.target.id == "subirRespuesta"){
            console.log(evento.currentTarget);
            if(respuestaForo.value != ""){
                // subirPregunta();
                // preguntaForo.value = "";
            } else {
                alert("No se ingreso ninguna respuesta");
            }
        }
    }

});