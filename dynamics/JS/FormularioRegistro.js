let regexAlumno = new RegExp('[13][0-9]{8}');
let regexProfesor = new RegExp('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}');
let regexTelefono = new RegExp('[5][0-9]{9}');

const datosAlumno = document.getElementById("alumno");
const datosProfesor = document.getElementById("profesor");
const select = document.getElementById("alumProf");
const numCuenta = document.getElementById("noCuenta");
const grado = document.getElementById("grado");
const grupo = document.getElementById("grupo");
const numTrabajador = document.getElementById("numTrabajador");
const btncontinuar = document.getElementById("continuar");
const numTelefono = document.getElementById("noTelef");

function verificaTelefono(){
    let todobien = false;
    if(numTelefono.value.length == 10){
        if(regexTelefono.test(numTelefono.value)){
            console.log("numero telefonico valido");
            todobien=true;
        } else {
            alert("El número telefónico es inválido");
        }
    } else {
        alert("El número telefónico es inválido");
    }
    return todobien;
}
function verificaDatos(){
    let todobien = false;
    if(select.value == 1){
        if(numCuenta.value == "" || grupo == "" || grado == ""){
            alert("Porfavor llena todos los datos");
        } else {
            if(numCuenta.value.length == 9){
                if(regexAlumno.test(numCuenta.value)){
                    console.log("si es un numero de cuenta: "+numCuenta.value);
                    todobien=true;
                } else {
                    alert("Esto no es un número de cuenta");
                }
            } else {
                alert("Esto no es un número de cuenta");
            }
        }
    } else if(select.value == 2){
        if(numTrabajador.value == ""){
            alert("Porfavor llena todos los datos");
        } else {
            if(numTrabajador.value.length == 13){
                if(regexProfesor.test(numTrabajador.value)){
                    console.log("Si es un numero de trabajador"+numTrabajador.value);
                    todobien=true;
                } else {
                    alert("Esto no es un número de trabajador");
                }
            } else {
                alert("Esto no es un número de trabajador");
            }
        }
    }
    return todobien;
}

select.addEventListener("click",()=>{
    if(select.value == 1){
        datosAlumno.style.display = "block";
        datosProfesor.style.display = "none";
    } else if(select.value == 2) {
        datosAlumno.style.display = "none";
        datosProfesor.style.display = "block";
    }
});

btncontinuar.addEventListener("click",(evento)=>{
    evento.stopPropagation();
    evento.preventDefault();
    if(verificaDatos() == true && verificaTelefono() == true){
        // window.location = "../dynamics/php/FormularioRegistro.php";
        // console.log("ola");
    } else {
        alert("Datos inválidos");
    }
});