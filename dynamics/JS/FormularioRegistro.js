let regexAlumno = new RegExp('[13][0-9]{8}');
let regexProfesor = new RegExp('[A-Z]{4}[0-9]{6}[A-Z0-9]{3}');
let regexTelefono = new RegExp('[5][0-9]{9}');

window.addEventListener("load", ()=>{
    const datosAlumno = document.getElementById("alumno");
    const datosProfesor = document.getElementById("profesor");
    const select = document.getElementById("alumProf");
    const numCuenta = document.getElementById("noCuenta");
    const grado = document.getElementById("grado");
    const grupo = document.getElementById("grupo");
    const turno = document.getElementById("turno");
    const numTrabajador = document.getElementById("numTrabajador");
    const btncontinuar = document.getElementById("continuar");
    const numTelefono = document.getElementById("noTelef");
    const formRegistro = document.getElementById("formRegistro");

    function verificaTelefono(){
        let todobien = false;
        if(numTelefono.value.length == 10){
            if(regexTelefono.test(numTelefono.value)){
                todobien = true;
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
            if(numCuenta.value == "" || grupo.value == "" || grado.value == "" || turno.value == ""){
                alert("Porfavor llena todos los datos");
            } else {
                if(numCuenta.value.length == 9){
                    if(regexAlumno.test(numCuenta.value)){
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

    function imprimeGrupos(){
        let datosForm = new FormData(formRegistro);
        fetch("../dynamics/php/Grupos.php",{
            method:"POST",
            body:datosForm,
        })
            .then((response)=>{
                return response.json();
            })
            .then((datosJSON)=>{
                if(datosJSON.ok == true){
                    let selectgrupo = document.getElementById("grupo");
                    selectgrupo.innerHTML = "";
                    for(resultado of datosJSON.resultados){
                        selectgrupo.innerHTML+="<option value='"+resultado.id+"'>"+resultado.numero+"</option>";
                    }
                } else {
                    alert(datosJSON.texto);
                }
            });
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

    imprimeGrupos();
    grado.addEventListener("change", imprimeGrupos);
    turno.addEventListener("change", imprimeGrupos);

    btncontinuar.addEventListener("click",(evento)=>{
        if(verificaDatos() == true && verificaTelefono() == true){
            alert("Datos válidos");
        } else {
            evento.stopPropagation();
            evento.preventDefault();
            alert("Datos inválidos");
        }
    });
});