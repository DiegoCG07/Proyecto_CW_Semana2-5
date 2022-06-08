window.addEventListener("load",()=>{
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
                    let tareas = document.getElementById("tareas");
                    tareas.innerHTML = "";
                    for(resultado of datosJSON.resultados){
                        tareas.innerHTML += "<div class='tarea' id="+resultado.ID_Tarea+">"+resultado.Nombre+"<br>"+resultado.Descripcion+"<br>"+resultado.Fecha_asignacion+"<br>"+resultado.Fecha_limite+"<br><br><div>";
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
    }
    muestraTareas();
});