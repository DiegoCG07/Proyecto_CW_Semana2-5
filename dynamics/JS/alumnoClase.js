window.addEventListener("load", ()=>{

    selectP = document.getElementById("publicaciones");
    divMaterial = document.getElementById("material");
    divTareas = document.getElementById("tareas");

    selectP.addEventListener("click",()=>{
        if(selectP.value == 1){
            divTareas.style.display = "block";
            muestraTareas();
            divMaterial.style.display = "none";
        } else if(selectP.value == 2) {
            divTareas.style.display = "none";
            divMaterial.style.display = "block";
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
                    divTareas.innerHTML += "<div class='tarea' id="+resultado.ID_Tarea+"><p>Título: "+resultado.Nombre+" </p><p>Ponderación: 100</p><p>Fecha de entrega: "+resultado.Fecha_limite+"</p><p>Estado: </p><p>Calificación: </p></div>";
                }
            } else {
                alert(datosJSON.texto);
            }
        });
    }
    function muestraMaterial(){
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
                let divMaterial= document.getElementById("material");
                divMaterial.innerHTML = "";
                for(resultado of datosJSON.resultados){
                    divMaterial.innerHTML += "<div class='tarea' id="+resultado.ID_Tarea+"><p>Título: "+resultado.Nombre+" </p><p>Publicado el: "+ +"/p><a id="+resultado.ID_Clase+"class='btn-primary'>Ver</a></div>";
                
                }
            } else {
                alert(datosJSON.texto);
            }
        });
    }


    


});

