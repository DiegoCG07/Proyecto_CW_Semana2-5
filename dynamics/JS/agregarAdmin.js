const btnAgregar = document.getElementById("btnAgregar");
const nombre = document.getElementById("nombre");
const apellidos = document.getElementById("apellidos");
const correo = document.getElementById("correo");
const usuario = document.getElementById("usuario");
const contrasena = document.getElementById("contrasena");
const formAgregar = document.getElementById("formAgregar");
const enviar = document.getElementById("enviar");
var agregar=false;

function crearAdministrador(){
    let datosForm = new FormData(formAgregar);
    datosForm.append("alumProf",4);
    fetch("../dynamics/php/FormularioRegistro.php",{
        method:"POST",
        body:datosForm,
    })
        .then((response)=>{
            return response.json();
        })
        .then((datosJSON)=>{
            if(datosJSON.ok == true){
                alert(datosJSON.texto);
                nombre.value="";
                apellidos.value="";
                correo.value="";
                usuario.value="";
                contrasena.value="";
            } else if(datosJSON.ok == false){
                alert(datosJSON.texto);
            }
        });
}

btnAgregar.addEventListener("click",()=>{
    if(agregar == false){
        formAgregar.style.display = "block";
        agregar = true;
    } else {
        formAgregar.style.display = "none";
        agregar = false;
    }
});

enviar.addEventListener("click",(evento)=>{
    evento.preventDefault();
    evento.stopPropagation();
    if(nombre.value==""&&apellidos.value==""&&correo.value==""&&usuario.value==""&&contrasena.value==""){
        alert("Por favor llena todos los datos");
    } else {
        crearAdministrador();
    }
});