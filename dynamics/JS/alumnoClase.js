window.addEventListener("load", ()=>{

    const selectP = document.getElementById("publicaciones");
    const divMaterial = document.getElementById("material");
    const divTareas = document.getElementById("tareas");
    const ahorcado = document.getElementById("ahorcado");

    selectP.addEventListener("click",()=>{
        if(selectP.value == 1){
            divTareas.style.display = "block";
            muestraTareas();
            divMaterial.style.display = "none";
            ahorcado.style.display = "none";
        } else if(selectP.value == 2) {
            muestraPublicaciones();
            divTareas.style.display = "none";
            divMaterial.style.display = "block";
            ahorcado.style.display = "none";
        } else if(selectP.value == 3) {
            divTareas.style.display = "none";
            divMaterial.style.display = "none";
            revisaEstadoJuego();
        }
    });

    function readCookie(name){
        let contenidoCookie = "";
        let listaCookies = misCookies.split(";");
        for (let i = 0; i < listaCookies.length; i++) {
            if (listaCookies[i].includes(name)){
                contenidoCookie = listaCookies[i].substring(name.length);
            }
        }
        return contenidoCookie;
    }
    var misCookies = document.cookie;

    function revisaEstadoJuego(){
        let datosForm = new FormData();
        // Agrego cookie
        let ID_Clase = readCookie("ID_Clase=");
        datosForm.append("ID_Clase",ID_Clase);
        fetch("../dynamics/php/revisaEstadoJuego.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    if(datosJSON.ID_EstadoJuego == 2){
                        console.log(datosJSON.ID_EstadoJuego);
                        ahorcado.style.display = "block";
                    } else {
                        let juegos = document.getElementById("juegos");
                        juegos.innerHTML = "No se han creado juegos";
                    }
                } else {
                    if(datosJSON.texto == "No se han creado juegos"){
                        let juegos = document.getElementById("juegos");
                        juegos.innerHTML = "No se han creado juegos";
                    } else {
                        alert(datosJSON.texto);
                    }
                }
            });
    }

    function muestraTareas(){
        let datosForm = new FormData();
        let ID_Clase = readCookie("ID_Clase=");
        datosForm.append("ID_Clase",ID_Clase);
        fetch("../dynamics/php/muestraTareas.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    let divTareas = document.getElementById("tareas");
                    divTareas.innerHTML = "";
                    for(resultado of datosJSON.resultados){
                        divTareas.innerHTML += "<div class='tarea' id="+resultado.ID_Tarea+"><p>T??tulo: "+resultado.Nombre+" </p><p>Ponderaci??n: 100</p><p>Fecha de entrega: "+resultado.Fecha_limite+"</p><p>Estado: </p><p>Calificaci??n: </p></div>";
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
    }

    function muestraPublicaciones(){
        let datosForm = new FormData();
        let ID_Clase = readCookie("ID_Clase=");
        datosForm.append("ID_Clase",ID_Clase);
        fetch("../dynamics/php/muestraMaterial.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    let material = document.getElementById("material");
                    material.innerHTML = "";
                    for(resultado of datosJSON.resultados){
                        material.innerHTML += "<div class='publicacion' id="+resultado.ID_Material+">"+resultado.Nombre+"<br>"+resultado.Descripcion+"<br>"+resultado.Fecha_Asignacion+"<br><iframe src='"+resultado.Ruta+"' width='700vw' height='300vw'></iframe><br><br><div>";
                        
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
    }
});

