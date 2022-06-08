const titulo = document.getElementById("titulo");
const descripcion = document.getElementById("descripcion");
const btnEnviar = document.getElementById("btnEnviar");
const material = document.getElementById("material");

function verificarDatos(){
    let todobien=false;
    if(titulo.value!="" && descripcion.value!="" && material.value!=""){
        todobien=true;
    }
    return todobien;
}

btnEnviar.addEventListener("click",(evento)=>{
    if(verificarDatos()!=true){
        evento.stopPropagation();
        evento.preventDefault();
        alert("Datos inválidos");
    }
});