var misCookies = document.cookie;

const titulo = document.getElementById("titulo");
const descripcion = document.getElementById("descripcion");
const btnEnviar = document.getElementById("btnEnviar");
const fecha = document.getElementById("fecha");

function verificarDatos(){
    let todobien=false;
    if(titulo.value!="" && descripcion.value!="" && fecha.value!=""){
        todobien=true;
    }
    return todobien;
}
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

function creaTarea(){
    let datosForm = new FormData();
    let date = new Date();
    date = date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate()+" "+date.getHours()+":"+date.getMinutes()+":"+date.getSeconds();
    // Agrego cookie
    let ID_Clase = readCookie("ID_Clase=");
    datosForm.append("ID_Clase",ID_Clase);
    datosForm.append("titulo",titulo.value);
    datosForm.append("descripcion",descripcion.value);
    datosForm.append("fechaAsignacion",date);
    datosForm.append("fechaLimite",fecha.value);
    fetch("../dynamics/php/creaTareaProf.php",{
        method:"POST",
        body:datosForm,
    })
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                alert(datosJSON.texto);
            } else {
                alert(datosJSON.texto);
            }
        });
}

btnEnviar.addEventListener("click",(evento)=>{
    evento.stopPropagation();
    evento.preventDefault();
    if(verificarDatos()==true){
        creaTarea();
    } else {
        alert("Datos inválidos");
    }
});